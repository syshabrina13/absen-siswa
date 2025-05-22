@extends('templates.layout')
@section('title', 'Data Jurusan')
@section('konten')
<div class="d-flex mb-2">
    <a href="{{route('jurusan.create')}}" class="btn btn-success btn-custom-width"><i class="fas fa-plus"></i> Tambah Data Jurusan</a>
    <a href="{{route('admin.lokal.index')}}" class="btn btn-primary btn-custom-width" style="margin-left: 30px;"><i class="fas fa-arrow-left"></i> Kembali</a>
</div>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Manajemen Data jurusan
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($jurusan as $dg)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$dg->nama_jurusan}}</td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('jurusan.show', $dg->id) }}" class='btn btn-outline-primary btn-sm'><i class='fas fa-eye' title="show"></i></a>

                                        <a href="{{route('jurusan.edit',$dg['id'])}}" class='btn btn-outline-warning btn-sm'><i class='fas fa-pencil-alt' title="edit"></i></a>


                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection