<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LokalController;
use App\Http\Controllers\RekapController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/Admin', function() {
    return view('index', [
        "menu" => "dashboard"
    ]);
})->name('Admin');

Route::get('/Login admin', function() {
    return view('Login', [
        "menu" => "Login"
    ]);
})->name('Login Admin');

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/loginproses', [LoginController::class, 'authentication'])->name('auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Siswa
Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
Route::post('/siswa/store', [SiswaController::class, 'store'])->name('siswa.store');
Route::get('/siswa/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::put('/siswa/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');
Route::delete('/siswa/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

// Guru
Route::get('/guru', [GuruController::class, 'index'])->name('guru.index'); // Menampilkan daftar guru
Route::get('/guru/create', [GuruController::class, 'create'])->name('guru.create'); // Form tambah data guru
Route::post('/guru/store', [GuruController::class, 'store'])->name('guru.store'); // Menyimpan data guru
Route::get('/guru/{id}', [GuruController::class, 'show'])->name('guru.show'); // Menampilkan detail guru
Route::get('/guru/edit/{id}', [GuruController::class, 'edit'])->name('guru.edit'); // Form edit data guru
Route::put('/guru/update/{id}', [GuruController::class, 'update'])->name('guru.update'); // Memperbarui data guru
Route::delete('/guru/delete/{id}', [GuruController::class, 'destroy'])->name('guru.destroy'); // Menghapus data guru

// Rekap for siswa
Route::get('/rekap', [RekapController::class, 'index'])->name('rekap.index');// Menampilkan rekap absen siswa

// Pengajuan for siswa
Route::get('/pengajuan/index', [GuruController::class, 'Pengajuan'])->name('pengajuan.index'); // Menampilkan daftar pengajuan
Route::get('/pengajuan/create', [GuruController::class, 'createPengajuan'])->name('pengajuan.create'); // Form tambah data pengajuan
Route::post('/pengajuan/store', [GuruController::class, 'storePengajuan'])->name('pengajuan.store');

// Absensi for Guru
Route::get('/absensi', [GuruController::class, 'absensi'])->name('guru.absensi');
Route::post('/absensi/store', [GuruController::class, 'storeAbsensi'])->name('guru.absensi.store');

// Lokal
Route::get('/lokal', [LokalController::class, 'index'])->name('lokal.index'); // Menampilkan daftar lokal
Route::get('/lokal/create', [LokalController::class, 'create'])->name('lokal.create'); // Form tambah data lokal
Route::post('/lokal/store', [LokalController::class, 'store'])->name('lokal.store'); // Menyimpan data lokal
Route::get('/lokal/{id}', [LokalController::class, 'show'])->name('lokal.show'); // Menampilkan detail lokal
Route::get('/lokal/edit/{id}', [LokalController::class, 'edit'])->name('lokal.edit'); // Form edit data lokal
Route::put('/lokal/update/{id}', [LokalController::class, 'update'])->name('lokal.update'); // Memperbarui data lokal
Route::delete('/lokal/delete/{id}', [LokalController::class, 'destroy'])->name('lokal.destroy'); // Menghapus data lokal

// User
Route::get('/user', [UserController::class, 'index'])->name('user.index'); // Menampilkan daftar user
Route::get('/user/create', [UserController::class, 'create'])->name('user.create'); // Form tambah data user
Route::post('/user/store', [UserController::class, 'store'])->name('user.store'); // Menyimpan data user
Route::get('/user/{id}', [UserController::class, 'show'])->name('user.show'); // Menampilkan detail user
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit'); // Form edit data user
Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update'); // Memperbarui data user
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy'); // Menghapus data user

// Jurusan
Route::get('/jurusan', [JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/create', [JurusanController::class, 'create'])->name('jurusan.create');
Route::post('/jurusan/store', [JurusanController::class, 'store'])->name('jurusan.store');
Route::get('/jurusan/{id}', [JurusanController::class, 'show'])->name('jurusan.show');
Route::get('/jurusan/edit/{id}', [JurusanController::class, 'edit'])->name('jurusan.edit');
Route::put('/jurusan/update/{id}', [JurusanController::class, 'update'])->name('jurusan.update');
Route::delete('/jurusan/delete/{id}', [JurusanController::class, 'destroy'])->name('jurusan.destroy');

// Absen
Route::get('/absen', [App\Http\Controllers\AbsenController::class, 'index'])->name('absen.index');
Route::get('/absen/create', [App\Http\Controllers\AbsenController::class, 'create'])->name('absen.create');
Route::post('/absen/store', [App\Http\Controllers\AbsenController::class, 'store'])->name('absen.store');
Route::get('/absen/{id}', [App\Http\Controllers\AbsenController::class, 'show'])->name('absen.show');
Route::get('/absen/edit/{id}', [App\Http\Controllers\AbsenController::class, 'edit'])->name('absen.edit');
Route::put('/absen/update/{id}', [App\Http\Controllers\AbsenController::class, 'update'])->name('absen.update');
Route::delete('/absen/delete/{id}', [App\Http\Controllers\AbsenController::class, 'destroy'])->name('absen.destroy');

Route::get('/dashboardGuru', [dashboardcontroller::class, 'dashboardGuru'])->name('dashboard-guru');

// Dashboard Siswa
Route::get('/dashboardsiswa', [DashboardController::class, 'dashboardSiswa'])->name('dashboard-siswa');

Route::resource('absen', AbsenController::class);
Route::post('absen/updateStatus', [AbsenController::class, 'updateStatus'])->name('absen.updateStatus');
Route::get('absen/{id}/edit', [AbsenController::class, 'edit'])->name('absen.edit');
Route::put('absen/{id}', [AbsenController::class, 'update'])->name('absen.update');

