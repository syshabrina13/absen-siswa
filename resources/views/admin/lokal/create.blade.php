@extends('templates.layout')
@section('title', 'tambah data lokal')
@section('konten')

<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Form Tambah Data Lokal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lokal.store') }}" method="post">
                    @csrf
                    <div class="col mt-2">
                        <label for="nama" class="text-gray-900">Nama Kelas</label>
                        <input type="text" name="nama" id="nama" class="form-control" required>
                    </div>
                    <div class="col mt-2">
                        <label for="id_jurusan" class="text-gray-900">Jurusan</label>
                        <select name="id_jurusan" id="id_jurusan" class="form-control" required>
                            <option value="" disabled selected>Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                                <option value="{{ $j->id }}">{{ $j->nama_jurusan }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-2">
                        <label for="id_guru" class="text-gray-900">Nama Guru</label>
                        <select name="id_guru" id="id_guru" class="form-control" required>
                            <option value="" disabled selected>Pilih Guru</option>
                            @foreach($guru as $g)
                                <option value="{{ $g->id }}">{{ $g->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col mt-2">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        <a href="{{ route('lokal.index') }}" class="btn btn-secondary float-right mr-2">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection