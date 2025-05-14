<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $datauser = User::all();
        return view('admin.user.index', [
            'menu' => 'user',
            'title' => 'Data user',
            'datauser' => $datauser
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.user.create', [
            'menu' => 'user',
            'title' => 'Tambah Data user',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'username' => 'required',
            'password' => 'required',
            'level' => 'required',

        ], [

            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'level.required' => 'Role Harus Diisi',

        ]);

        $user  = new User;

        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = $validasi['level'];
        $user->save();
        return redirect(route('user.index'));
    }

    public function show($id)
    {
        $user = user::find($id);
        return view('admin.user.view', [
            'menu' => 'user',
            'title' => 'Detail Data user',
            'user' => $user
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
$user = user::find($id);
        return view('admin.user.edit', [
            'menu' => 'user',
            'title' => 'Edit Data user',
            'user' => $user,

        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([

            'username' => 'nullable',
            'password' => 'nullable',
            'level' => 'nullable',
        ]);

        $user = user::find($id);
      
        $user->username = $validasi['username'] ?? $user->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($validasi['password']);
        }
        $user->level = $validasi['level'] ?? $user->level;
        $user->save();
        return redirect(route('user.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user = user::find($id);
        $user->delete();
        return redirect(route('user.index'));
    }
}