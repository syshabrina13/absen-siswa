@extends('templates.layout')
@section('title', 'Edit Data Guru')
@section('konten')

<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Form Edit Data Guru</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('guru.update', $guru->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col mt-2">
                        <label for="nama" class="text-gray-900">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="{{ $guru->nama }}" required>
                    </div>

                    <div class="col mt-2">
                        <label for="nip" class="text-gray-900">NIP</label>
                        <input type="text" name="nip" id="nip" class="form-control" value="{{ $guru->nip }}" required>
                    </div>

                    <div class="col mt-2">
                        <label for="mata_pelajaran" class="text-gray-900">Mata Pelajaran</label>
                        <input type="text" name="mata_pelajaran" id="mata_pelajaran" class="form-control" value="{{ $guru->mata_pelajaran }}" required>
                    </div>

                    <div class="col mt-2">
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                        <a href="{{ route('guru.index') }}" class="btn btn-secondary float-right mr-2">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection