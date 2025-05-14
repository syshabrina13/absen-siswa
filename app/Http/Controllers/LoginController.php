<?php

namespace App\Http\Controllers;

use App\Models\Guru;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    function showLoginForm()
    {
        return view('login', [
            'menu' => 'login',
            'title' => 'Login Pengguna'
        ]);
    }

     function authentication(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
 
            // Cek apakah user ini adalah guru
            $guru = Guru::where('username', $user->username)->first();
            if ($guru) {
                if ($user->level === 'walikelas') {
                    return redirect()->route('dashboard-walikelas');
                }
                return redirect()->route('dashboard-guru');
            }

            // Cek apakah user ini adalah siswa
            $siswa = Siswa::where('username', $user->username)->first();
            if ($siswa && $user->level === 'siswa') {
                return redirect()->route('rekap.index');
            }

            // Jika user adalah admin
            if ($user->level === 'admin') {
                return redirect()->route('Admin');
            }

        } else {
            return redirect()->back()->with('error', 'Username atau Password Salah');
        }
        
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}