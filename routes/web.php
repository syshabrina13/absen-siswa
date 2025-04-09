<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;

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
