<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = jurusan::all();
        return view('admin.jurusan.index', [
            'menu' => 'jurusan',
            'title' => 'Data jurusan',
            'jurusan' => $jurusan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
 {
        return view('admin.jurusan.create', [
            'menu' => 'jurusan',
            'title' => 'Tambah Data jurusan',
           
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama_jurusan' => 'required',
            'kode_jurusan' => 'required',
           
        ], [
            'nama_jurusan.required' => 'Nama Jurusan Harus Diisi',
            'kode_jurusan.required' => 'Kode Jurusan Harus Diisi',
         
        ]);

        $jurusan = new jurusan;
        $jurusan->nama_jurusan = $validasi['nama_jurusan'];
        $jurusan->kode_jurusan = $validasi['kode_jurusan'];
      
        $jurusan->save();
        return redirect(route('jurusan.index'));
    }

    public function show($id)
    {
        $jurusan = jurusan::find($id);
        return view('admin.jurusan.view', [
            'menu' => 'jurusan',
            'title' => 'Detail Data jurusan',
            'jurusan' => $jurusan
        ]);
    }
    /**
     * Display the specified resource.
     */
    public function edit($id)
    {
        $jurusan = jurusan::find($id);
        return view('admin.jurusan.edit', [
            'menu' => 'jurusan',
            'title' => 'Edit Data jurusan',
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',

        ]);

        $jurusan = jurusan::find($id);
        $jurusan->nama = $validasi['nama_jurusan'] ?? $jurusan->nama;
        $jurusan->save();
        return redirect(route('jurusan.index'));
    }

}