<?php

namespace App\Http\Controllers;

use App\Models\Lokal;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Models\Kelas; // Pastikan model Kelas diimport

class SiswaController extends Controller
{
    // Display a listing of the students
    public function index()
    {
        $siswa = Siswa::all(); // Fetch all students
        return view('siswa.index', compact('siswa')); // Pass data to the view
    }

    // Show the form for creating a new student
    public function create()
    {
        $lokal = Lokal::all(); // Ambil semua data kelas
        return view('siswa.create', compact('lokal')); // Kirim data ke view
    }

    // Store a newly created student in the database
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis',
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        Siswa::create($request->all()); // Create a new student
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }

    // Show the form for editing the specified student
    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id); // Find the student by ID
        return view('siswa.edit', compact('siswa')); // Pass data to the edit form view
    }

    // Update the specified student in the database
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nis' => 'required|string|max:20|unique:siswa,nis,' . $id,
            'kelas' => 'required|string|max:50',
            'jurusan' => 'required|string|max:50',
        ]);

        $siswa = Siswa::findOrFail($id); // Find the student by ID
        $siswa->update($request->all()); // Update the student data
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    // Remove the specified student from the database
    public function destroy($id)
    {
        $siswa = Siswa::findOrFail($id); // Find the student by ID
        $siswa->delete(); // Delete the student
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
