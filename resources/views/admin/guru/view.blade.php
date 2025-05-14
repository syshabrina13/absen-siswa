@extends('templates.layout')
@section('title', 'Detail Data Guru')
@section('konten')

<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Detail Data Guru</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Nama</strong></td>
                        <td>:</td>
                        <td>{{ $guru->nama }}</td>
                    </tr>
                    <tr>
                        <td><strong>NIP</strong></td>
                        <td>:</td>
                        <td>{{ $guru->nip }}</td>
                    </tr>
                    <tr>
                        <td><strong>Mata Pelajaran</strong></td>
                        <td>:</td>
                        <td>{{ $guru->mata_pelajaran }}</td>
                    </tr>
                </table>
                <a href="{{ route('guru.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection