@extends('templates.layout')
@section('title', 'Edit Data Lokal')
@section('konten')

<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Form Edit Data Lokal</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('lokal.update', $lokal->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="col mt-2">
                        <label for="nama_kelas" class="text-gray-900">Nama Kelas</label>
                        <input type="text" name="nama_kelas" id="nama_kelas" class="form-control" value="{{ $lokal->nama_kelas }}" required>
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