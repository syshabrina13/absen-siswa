@extends('template-guru.layout')
@section('title', 'Data Absen')
@section('konten')

<a href="{{route('absen.index')}}" class="btn btn-success btn-custom-width mb-2"><i class="fas fa-arrow-left"></i> Kembali</a>

<div class="card">
    <h5 class="card-header">Absen Siswa</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('absen.create') }}">
            <div class="row">
                <div class="col-md-4">
                    <select name="kelas" class="form-control">
                        <option value="">Pilih Kelas</option>
                        @foreach($lokals as $lokal)
                        <option value="{{ $lokal->id }}" {{ request('kelas') == $lokal->id ? 'selected' : '' }}>
                            {{ $lokal->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
    </div>
    <div class="table-responsive text-nowrap">
        <form method="POST" action="{{ route('absen.updateStatus') }}">
            @csrf
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Hadir</th>
                        <th>Sakit</th>
                        <th>Alpa</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($datasiswa as $dg)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$dg->nama}}</td>
                        <td>{{$dg->lokal->nama}}</td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="hadir" class="select-hadir">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="sakit" class="select-sakit">
                        </td>
                        <td>
                            <input type="radio" name="status[{{ $dg->id }}]" value="alpa" class="select-alpa">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-sm-2 text-right">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection