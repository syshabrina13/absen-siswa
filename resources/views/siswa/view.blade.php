@extends('templates.layouts')
@section('judul_halaman','Data Siswa')
@section('kontent')
<div class="row mt-5">
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Data Siswa</h5>
           </div>

        <div class="card-body">
            <table>
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$siswa->nama}}</td>
                </tr>
                <tr>
                    <td>NISN</td>
                    <td>:</td>
                    <td>{{$siswa->nisn}}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td>{{$siswa->jk}}</td>
                </tr>
                <tr>
                    <td>Kelas</td>
                    <td>:</td>
                    <td>{{$siswa->lokal->nama_kelas}}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$siswa->alamat}}</td>
                </tr>
                <tr>
                    <td>No Telepon</td>
                    <td>:</td>
                    <td>{{$siswa->no_telp}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

</div>
@endsection