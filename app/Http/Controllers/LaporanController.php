<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
     public function index(Request $request)
    {
        $bulan = $request->get('bulan', date('n'));
        $tahun = $request->get('tahun', date('Y'));

        // Ambil semua siswa beserta absensi di bulan & tahun yang dipilih
        $absensis = Siswa::with(['absensis' => function($query) use ($bulan, $tahun) {
            $query->whereMonth('tanggal_absen', $bulan)
                  ->whereYear('tanggal_absen', $tahun);
        }])->get();

        return view('guru.laporan', [
            'absensis' => $absensis,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }
}
