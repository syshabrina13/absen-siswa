<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokal;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokalController extends Controller
{
    // Menampilkan daftar lokal
    public function index()
    {
        $lokal = Lokal::all(); // Ambil semua data lokal
        return view('admin.lokal.index', compact('lokal')); // Kirim data ke view
    }

    // Menampilkan form tambah data lokal
    public function create()
    {
        $jurusan = Jurusan::all();
        $guru = Guru::all(); // Ambil semua data guru
    
        return view('admin.lokal.create', [
            'menu' => 'lokal',
            'title' => 'Tambah Data Kelas',
            'jurusan' => $jurusan,
            'guru' => $guru // Kirim data guru ke view
        ]); // Tampilkan form tambah data
    }

    // Menyimpan data lokal baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'id_jurusan' => 'required',
            'id_guru' => 'required',
        ]);

        Lokal::create($request->all()); // Simpan data lokal
        return redirect()->route('admin.lokal.index')->with('success', 'Data lokal berhasil ditambahkan.');
    }

    // Menampilkan detail data lokal
    public function show($id)
    {
        $lokal = Lokal::findOrFail($id); // Cari data lokal berdasarkan ID
        return view('admin.lokal.view', compact('lokal')); // Kirim data ke view
    }

    // Menampilkan form edit data lokal
    public function edit($id)
    {
        $lokal = Lokal::findOrFail($id); // Cari data lokal berdasarkan ID
        return view('admin.lokal.edit', compact('lokal')); // Kirim data ke view edit
    }

    // Memperbarui data lokal di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
        ]);

        $lokal = Lokal::findOrFail($id); // Cari data lokal berdasarkan ID
        $lokal->update($request->all()); // Perbarui data lokal
        return redirect()->route('admin.lokal.index')->with('success', 'Data lokal berhasil diperbarui.');
    }

    // Menghapus data lokal dari database
    public function destroy($id)
    {
        $lokal = Lokal::findOrFail($id); // Cari data lokal berdasarkan ID
        $lokal->delete(); // Hapus data lokal
        return redirect()->route('admin,lokal.index')->with('success', 'Data lokal berhasil dihapus.');
    }
}
