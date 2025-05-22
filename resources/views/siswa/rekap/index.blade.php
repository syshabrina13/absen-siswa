@extends('template-siswa.layout')
@section('title', 'Rekap Absensi Siswa')
@section('konten')

<div class="row mb-3">
    <div class="col-md-6">
        <form method="GET" action="{{ route('rekap.index') }}">
            <div class="form-row align-items-end">
                <div class="col">
                    <label>Bulan</label>
                    <select name="bulan" class="form-control">
                        @foreach(range(1,12) as $b)
                            <option value="{{ $b }}" {{ request('bulan') == $b ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $b)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col">
                    <label>Tahun</label>
                    <select name="tahun" class="form-control">
                        @for($y = now()->year; $y >= 2020; $y--)
                            <option value="{{ $y }}" {{ request('tahun') == $y ? 'selected' : '' }}>
                                {{ $y }}
                            </option>
                        @endfor
                    </select>
                </div>
                <div class="col">
                    <button class="btn btn-primary">Tampilkan</button>
                </div>
            </div>
        </form>
    </div>
</div>

@if($rekapAbsensi->count())
<div class="row mb-4">
    <div class="col-md-3">
        <div class="card text-white bg-success shadow">
            <div class="card-body text-center">
                Hadir
                <h3>{{ $rekapAbsensi->where('status', 'hadir')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-warning shadow">
            <div class="card-body text-center">
                Izin
                <h3>{{ $rekapAbsensi->where('status', 'izin')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-info shadow">
            <div class="card-body text-center">
                Sakit
                <h3>{{ $rekapAbsensi->where('status', 'sakit')->count() }}</h3>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-white bg-danger shadow">
            <div class="card-body text-center">
                Alpa
                <h3>{{ $rekapAbsensi->where('status', 'alpa')->count() }}</h3>
            </div>
        </div>
    </div>
</div>
@endif

@php
    $bulanInt = request('bulan') ?? now()->month;
    $bulanNama = DateTime::createFromFormat('!m', $bulanInt)->format('F');
@endphp

<div class="card">
    <div class="card-header bg-primary text-white">
        <strong>Rekap Absensi Bulan {{ $bulanNama }} {{ request('tahun') ?? now()->year }}</strong>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover" id="dataTable">
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
                        <td>
                            <span class="badge 
                                @if($rekap->status == 'hadir') bg-success 
                                @elseif($rekap->status == 'izin') bg-warning 
                                @elseif($rekap->status == 'sakit') bg-info 
                                @else bg-danger @endif">
                                {{ ucfirst($rekap->status) }}
                            </span>
                        </td>
                        <td>{{$rekap->guru->nama}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
