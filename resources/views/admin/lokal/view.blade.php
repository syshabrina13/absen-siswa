@extends('templates.layout')
@section('title', 'Detail Data Lokal')
@section('konten')

<div class="row mt-5">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-primary">Detail Data Lokal</h5>
            </div>
            <div class="card-body">
                <table class="table table-borderless">
                    <tr>
                        <td><strong>Nama Kelas</strong></td>
                        <td>:</td>
                        <td>{{ $lokal->nama_kelas }}</td>
                    </tr>
                </table>
                <a href="{{ route('admin.lokal.index') }}" class="btn btn-secondary mt-3">Kembali</a>
            </div>
        </div>
    </div>
</div>

@endsection