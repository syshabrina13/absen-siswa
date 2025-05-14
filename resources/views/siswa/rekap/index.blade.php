@extends('template-siswa.layout')
@section('title', 'Data Kelas')
@section('konten')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="m-0 font-weight-bold text-gray text-primary">
                    Rekap Absensi {{$siswa->nama}}
                </h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Tanggal</th>
                                <th>Jam Masuk</th>
                                <th>Status</th>
                                <th>Guru yang Mengabsen</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($rekapAbsensi->sortByDesc('tanggal_absen') as $rekap)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$rekap->tanggal_absen}}</td>
                                <td>{{$rekap->jam_absen}}</td>
                                <td>{{$rekap->status}}</td>
                                <td>{{$rekap->guru->nama}}</td>
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