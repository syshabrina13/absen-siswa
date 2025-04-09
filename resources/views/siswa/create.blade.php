@extends('templates.layouts')
@section('judul_halaman','Data Siswa')
@section('kontent')
<div class="row mt-5">
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Input Data Kelas</h5>
           </div>

        <div class="card-body">
            <form action="{{route('siswa.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col mt-2">
                    <label for="nama" class="text-gray-900">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control"> 
                </div>

                <div class="col mt-2">
                    <label for="nisn" class="text-gray-900">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control"> 
                </div>

                <div class="col mt-2">
                    <label for="jk" class="text-gray-900">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control">
                        <option value="">--PILIH--</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col mt-2">
                    <label for="lokal_id" class="text-gray-900">Kelas</label>
                    <select name="lokal_id" id="lokal_id" class="form-control">
                        <option value="">--PILIH--</option>
                        @foreach($lokal as $l)
                        <option value="{{$l->id}}">{{$l->nama_kelas}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col mt-2">
                    <label for="alamat" class="text-gray-900">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control"> </textarea>
                </div>

                <div class="col mt-2">
                    <label for="no_telp" class="text-gray-900">No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control"> 
                </div>

            </form>
        </div>
    </div>
</div>
<div class="col-6">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
</div>
</div>
@endsection