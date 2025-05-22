<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Mengabsen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RekapController extends Controller
{
    public function index()
    {
        $siswa = Siswa::where('username', Auth::user()->username)->firstOrFail();
        $rekapAbsensi = Mengabsen::where('id_siswa', $siswa->id)->with('guru')->get();

        return view('siswa.rekap.index', [
            'menu' => 'dashboard',
            'title' => 'Rekap Absensi ' . $siswa->nama,
            'siswa' => $siswa,
            'rekapAbsensi' => $rekapAbsensi
        ]);
    }
    public function rekap(Request $request)
{
    $bulan = $request->input('bulan', now()->month);
    $tahun = $request->input('tahun', now()->year);
    $siswa = Siswa::where('id_user', Auth::id())->first();

    $rekapAbsensi = Mengabsen::with('guru')
        ->where('id_siswa', $siswa->id)
        ->whereMonth('tanggal_absen', $bulan)
        ->whereYear('tanggal_absen', $tahun)
        ->get();

    return view('siswa.rekap', [
        'rekapAbsensi' => $rekapAbsensi,
        'siswa' => $siswa,
    ]);
}

}

