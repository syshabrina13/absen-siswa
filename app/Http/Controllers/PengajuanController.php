<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokal;
use App\Models\Siswa;
use App\Models\Mengabsen;
use App\Models\Pengajuan;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('username', Auth::user()->username)->firstOrFail();
        $pengajuans = Pengajuan::where('id_siswa', $siswa->id)->get();

        return view('siswa.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan ' . $siswa->nama,
            'siswa' => $siswa,
            'pengajuans' => $pengajuans
        ]);
    }

    public function create()
    {
        return view('siswa.pengajuan.create', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan Baru'
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'keterangan' => 'required',
        'foto' => 'required|image',
    ]);

    $nm = $request->file('foto');
    $namaFile = $nm->getClientOriginalName();

    $siswa = Siswa::where('username', Auth::user()->username)->firstOrFail();
    $lokal = Lokal::findOrFail($siswa->id_lokal);
    $id_guru = $lokal->id_guru;

    $pengajuan = new Pengajuan();
    $pengajuan->keterangan = $request->keterangan;
    $pengajuan->tanggal_pengajuan = now()->toDateString();
    $pengajuan->jam_absen = now()->toTimeString();
    $pengajuan->status = 'menunggu';
    $pengajuan->foto = $namaFile;
    $pengajuan->id_siswa = $siswa->id;
    $pengajuan->id_guru = $id_guru;
    $nm->move(public_path('foto'), $namaFile);
    $pengajuan->save();

    // Buat notifikasi
    Notifikasi::create([
        'title' => 'Pengajuan Baru',
        'message' => 'Pengajuan baru dari ' . $siswa->nama,
        'id_pengajuan' => $pengajuan->id,
        'id_guru' => $id_guru,
        'is_read' => false,
    ]);

    return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil disimpan.');
}

    public function index3()
    {
        $guru = Guru::where('username', Auth::user()->username)->firstOrFail();
        $pengajuans = Pengajuan::where('id_guru', $guru->id)
            ->where('status', 'menunggu') // Hanya ambil pengajuan yang belum diproses
            ->with('siswa.lokal')
            ->get();

        return view('walikelas.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan untuk ' . $guru->nama,
            'guru' => $guru,
            'pengajuans' => $pengajuans
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:diterima,ditolak',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->status = $request->status;
        $pengajuan->save();

        // Determine the status for the mengabsen table
        $absenStatus = $request->status == 'diterima' ? 'sakit' : 'alpa';

        // Check if the record already exists in the mengabsen table
        $mengabsen = Mengabsen::where('id_siswa', $pengajuan->id_siswa)
            ->where('tanggal_absen', $pengajuan->tanggal_pengajuan)
            ->first();

        if ($mengabsen) {
            // Update the existing record
            $mengabsen->update([
                'jam_absen' => $pengajuan->jam_absen,
                'status' => $absenStatus,
                'id_guru' => $pengajuan->id_guru,
            ]);
        } else {
            // Create a new record
            Mengabsen::create([
                'tanggal_absen' => $pengajuan->tanggal_pengajuan,
                'jam_absen' => $pengajuan->jam_absen,
                'status' => $absenStatus,
                'id_siswa' => $pengajuan->id_siswa,
                'id_guru' => $pengajuan->id_guru,
            ]);
        }

        Notifikasi::where('id_pengajuan', $id)->update(['is_read' => true]);

        return redirect()->route('dashboard-walikelas')->with('success', 'Status pengajuan berhasil diperbarui, data absen disimpan, dan notifikasi dihapus.');
    }

    public function indexAdmin()
    {
        $pengajuans = Pengajuan::with('siswa.lokal')->get();

        return view('admin.pengajuan.index', [
            'menu' => 'pengajuan',
            'title' => 'Pengajuan',
            'pengajuans' => $pengajuans
        ]);
    }
}
