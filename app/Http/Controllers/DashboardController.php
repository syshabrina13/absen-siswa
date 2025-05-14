<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokal;
use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboardAdmin()
    {
       
        $jumlahGuru = Guru::count(); // Menghitung jumlah guru
        $jumlah = Lokal::count(); // Menghitung jumlah lokal
        $jumlahJurusan = Jurusan::count(); // Menghitung jumlah jurusan

        return view('admin.index', [
            'menu' => 'dashboard',
            
        ]);
    }
    public function dashboardGuru()
    {
       
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLokal = lokal::count(); // Menghitung jumlah lokal
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        // Ambil data guru berdasarkan user yang sedang login
        $guru = guru::where('id_user', Auth::id())->first();

        return view('guru.index', [
            'menu' => 'dashboard',
            
        ]);
    }
    public function dashboardWalikelas()
    {
        
        $jumlahGuru = guru::count(); // Menghitung jumlah guru
        $jumlahLokal = lokal::count(); // Menghitung jumlah lokal
        $jumlahJurusan = jurusan::count(); // Menghitung jumlah jurusan

        // Ambil data guru berdasarkan user yang sedang login
        $guru = guru::where('id_user', Auth::id())->first();

        return view('walikelas.index', [
            'menu' => 'dashboard',
            
        ]);
    }

    public function dashboardSiswa()
    {
        return view('siswa.index');
    }
}
