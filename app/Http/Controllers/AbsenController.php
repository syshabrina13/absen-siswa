<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokal;
use App\Models\Siswa;
use App\Models\Mengabsen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    public function index(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_lokal', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal_absen', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $lokals = Lokal::all();

        return view('guru.absensi.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'lokals' => $lokals
        ]);
    }

   public function create(Request $request)
    {
        $query = Siswa::with('lokal');

        if ($request->has('kelas') && $request->kelas != '') {
            $query->where('id_lokal', $request->kelas);
        }

        $datasiswa = $query->get();
        $lokals = Lokal::all();

        return view('guru.absensi.create', [
            'menu' => 'absen',
            'title' => 'Absen Siswa',
            'datasiswa' => $datasiswa,
            'lokals' => $lokals
        ]);
    }

    public function updateStatus(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('username', Auth::user()->username)->first(); // Get the logged-in guru

        foreach ($statuses as $id => $status) {
            $siswa = Siswa::findOrFail($id);

            // Update status in siswa table
            $siswa->status = $status;
            $siswa->save();

            // Create a new record in mengabsens table
            Mengabsen::create([
                'tanggal_absen' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        return redirect()->route('absen.index')->with('success', 'Status siswa dan tanggal absen berhasil diperbarui.');
    }

    public function edit($id)
    {
        $mengabsen = Mengabsen::with('siswa.lokal')->findOrFail($id);
        return view('guru.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'mengabsen' => $mengabsen
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $mengabsen = Mengabsen::findOrFail($id);
        $mengabsen->status = $validasi['status'];
        $mengabsen->save();

        $siswa = siswa::findOrFail($mengabsen->id_siswa);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absen.index'))->with('success', 'Status siswa berhasil diperbarui.');
    }

    public function membuat(Request $request)
    {
        $request->validate([
            'status' => 'required|array',
            'status.*' => 'in:hadir,izin,sakit,alpa',
        ]);

        $statuses = $request->input('status', []);
        $currentDate = now()->toDateString();
        $currentTime = now()->toTimeString();
        $guru = Guru::where('id_user', Auth::id())->first();
        // Get the logged-in guru

        foreach ($statuses as $id => $status) {
            $siswa = Siswa::findOrFail($id);

            // Update status in siswa table
            $siswa->status = $status;
            $siswa->save();

            // Create a new record in mengabsens table
            Mengabsen::create([
                'tanggal_absen' => $currentDate,
                'jam_absen' => $currentTime,
                'status' => $status,
                'id_guru' => $guru->id,
                'id_siswa' => $id,
            ]);
        }

        return redirect()->route('absenWalikelas.index');
    }

    public function editWalikelas($id)
    {
        $mengabsen = Mengabsen::with('siswa.lokal')->findOrFail($id);
        return view('walikelas.absen.ubah', [
            'menu' => 'absen',
            'title' => 'Edit Absen',
            'mengabsen' => $mengabsen
        ]);
    }

    public function updateWalikelas(Request $request, $id)
    {
        $validasi = $request->validate([
            'status' => 'required',
        ], [
            'status.required' => 'Status harus diisi',
        ]);

        $mengabsen = Mengabsen::findOrFail($id);
        $mengabsen->status = $validasi['status'];
        $mengabsen->save();

        $siswa = Siswa::findOrFail($mengabsen->id_siswa);
        $siswa->status = $validasi['status'];
        $siswa->save();

        return redirect(route('absenWalikelas.index'))->with('success', 'Status siswa berhasil diperbarui.');
    }
    public function indexSiswa(Request $request)
    {
        $query = Mengabsen::with(['siswa', 'guru']);

        if ($request->has('kelas') && $request->kelas != '') {
            $query->whereHas('siswa', function ($q) use ($request) {
                $q->where('id_lokal', $request->kelas);
            });
        }

        if ($request->has('tanggal_absen') && $request->tanggal_absen != '') {
            $query->whereDate('tanggal_absen', $request->tanggal_absen);
        }

        $dataabsen = $query->get();
        $lokals = lokal::all();

        return view('admin.absen.index', [
            'menu' => 'absen',
            'title' => 'Data Absen',
            'dataabsen' => $dataabsen,
            'lokals' => $lokals
        ]);
    }
}
