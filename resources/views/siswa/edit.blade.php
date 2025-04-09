@extends('templates.layouts')
@section('judul_halaman','Data Siswa')
@section('kontent')
<div class="row mt-5">
<div class="col-6">
    <div class="card">
        <div class="card-header">
            <h5 class="m-0 font-weight-bold text-primary">Input Data Siswa</h5>
           </div>

        <div class="card-body">
            <form action="{{route('siswa.update')}}" method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{$data_siswa->id}}">
                </div>
                <div class="col mt-2">
                    <label for="nama" class="text-gray-900">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{$data_siswa->nama}}">
                </div>

                <div class="col mt-2">
                    <label for="nisn" class="text-gray-900">NISN</label>
                    <input type="text" name="nisn" id="nisn" class="form-control" value="{{$data_siswa->nisn}}"> 
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
                    <label for="jk" class="text-gray-900">Jenis Kelamin</label>
                    <input type="text" name="jk" id="jk" class="form-control" value="{{$data_siswa->jk}}"> 
                </div>

                <div class="col mt-2">
                    <label for="lokal_id" class="text-gray-900">Kelas</label>
                    <input type="text" name="lokal_id" id="lokal_id" class="form-control" value="{{$data_siswa->lokal_id}}"> 
                </div>

                <div class="col mt-2">
                    <label for="alamat" class="text-gray-900">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" value="{{$data_siswa->alamat}}"> 
                </div>

                <div class="col mt-2">
                    <label for="no_telp" class="text-gray-900">No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" class="form-control" value="{{$data_siswa->no_telp}}"> 
                </div>

                <div class="col mt-2">
                    <label for="foto" class="text-gray-900">Foto</label>
                    <input type="file" name="foto" id="foto" class="form-control" accept="image/*" value="{{$data_siswa->foto}}"> 
                </div>

                <div class="col mt-2">
                    <button type="submit" class="btn btn-md btn-primary float-right">Simpan</button>
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