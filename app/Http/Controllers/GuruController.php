<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\User;
use App\Models\Pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    public function index()
    {
        $dataguru = Guru::all();
        return view('admin.guru.index', [
            'menu' => 'guru',
            'title' => 'Data Guru',
            'dataguru' => $dataguru
        ]);
    }

    public function create()
    {
        return view('admin.guru.create', [
            'menu' => 'guru',
            'title' => 'Tambah Data Guru'
        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'nohp' => 'required',
            'jk' => 'required',
            'tanggal_lahir' => 'required',
            'username' => 'required',
            'password' => 'required',
            'id_user' => 'nullable',
            'keterangan' => 'required',
            'foto' => 'required|image',
        ], [
            'nama.required' => 'Nama Harus Diisi',
            'nip.required' => 'NIP Harus Diisi',
            'nohp.required' => 'Nomor HP Harus Diisi',
            'jk.required' => 'Jenis Kelamin Harus Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'keterangan' => 'harus diisi',
            'foto' => 'required|image',
        ]);

        $user = new User();
        $user->username = $validasi['username'];
        $user->password = bcrypt($validasi['password']);
        $user->level = 'guru';
        $user->save();

        $guru = new Guru;
        $guru->nama = $validasi['nama'];
        $guru->nip = $validasi['nip'];
        $guru->nohp = $validasi['nohp'];
        $guru->jk = $validasi['jk'];
        $guru->tanggal_lahir = $validasi['tanggal_lahir'];
        $guru->username = $validasi['username'];
        $guru->password = $validasi['password'];
        $guru->id_user = $user->id;
        $guru->save();

        return redirect(route('guru.index'));
    }

    public function show($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.view', [
            'menu' => 'guru',
            'title' => 'Detail Data Guru',
            'guru' => $guru
        ]);
    }

    public function edit($id)
    {
        $guru = Guru::find($id);
        return view('admin.guru.edit', [
            'menu' => 'guru',
            'title' => 'Edit Data Guru',
            'guru' => $guru
        ]);
    }

    public function update(Request $request, $id)
    {
        $validasi = $request->validate([
            'nama' => 'nullable',
            'nip' => 'nullable',
            'nohp' => 'nullable',
            'jk' => 'nullable',
            'tanggal_lahir' => 'nullable',
            'username' => 'nullable',
            'password' => 'nullable',
            'id_user' => 'nullable',
        ]);

        $guru = Guru::findOrFail($id);
        $guru->nama = $validasi['nama'] ?? $guru->nama;
        $guru->nip = $validasi['nip'] ?? $guru->nip;
        $guru->nohp = $validasi['nohp'] ?? $guru->nohp;
        $guru->jk = $validasi['jk'] ?? $guru->jk;
        $guru->tanggal_lahir = $validasi['tanggal_lahir'] ?? $guru->tanggal_lahir;
        $guru->username = $validasi['username'] ?? $guru->username;
        if ($request->filled('password')) {
            $guru->password = bcrypt($validasi['password']);
        }
        $guru->save();

        $user = User::findOrFail($guru->id_user);
        $user->username = $validasi['username'] ?? $user->username;
        if ($request->filled('password')) {
            $user->password = bcrypt($validasi['password']);
        }
        $user->save();

        return redirect(route('guru.index'));
    }

    public function destroy($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->id_user) {
            User::where('id', $guru->id_user)->delete();
        }

        $guru->delete();
        return redirect(route('guru.index'));
    }

    public function rekap(Request $request)
    {
        $bulan = $request->get('bulan', date('n'));
        $tahun = $request->get('tahun', date('Y'));

        $siswas = \App\Models\Siswa::with(['mengabsen' => function($query) use ($bulan, $tahun) {
            $query->whereMonth('tanggal_absen', $bulan)
                  ->whereYear('tanggal_absen', $tahun);
        }])->get();

        return view('guru.laporan', [
            'absensis' => $siswas,
            'bulan' => $bulan,
            'tahun' => $tahun
        ]);
    }

    public function Pengajuan()
    {
        $pengajuans = Pengajuan::all();
        $siswa = Auth::user()->siswa ?? null;
        return view('siswa.pengajuan.index', compact('pengajuans', 'siswa'));
    }

    public function createPengajuan()
    {
        $siswa = Auth::user()->siswa ?? null;
        return view('siswa.pengajuan.create', compact('siswa'));
    }

    public function storePengajuan(Request $request)
    {
        $request->validate([
            'keterangan' => 'required',
            'foto' => 'required|image',
        ]);

        $fotoPath = $request->file('foto')->store('pengajuan', 'public');

        Pengajuan::create([
            'keterangan' => $request->keterangan,
            'foto' => $fotoPath,
            'id_siswa' => Auth::user()->siswa->id ?? null,
        ]);

        return redirect()->route('pengajuan.index')->with('success', 'Pengajuan berhasil dikirim!');
    }
}