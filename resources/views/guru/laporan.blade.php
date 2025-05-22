@extends('template-guru.layout')
@section('title', 'Rekap Absensi Siswa')
@section('konten')
<div class="container mt-4">
    <h3>Rekap Absensi Bulan {{ $bulan }} Tahun {{ $tahun }}</h3>

    <form method="GET" action="{{ route('guru.rekap') }}" class="form-inline mb-3">
        <label class="mr-2">Bulan:</label>
        <select name="bulan" class="form-control mr-2">
            @for ($i = 1; $i <= 12; $i++)
                <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>{{ $i }}</option>
            @endfor
        </select>

        <label class="mr-2">Tahun:</label>
        <select name="tahun" class="form-control mr-2">
            @for ($y = 2022; $y <= now()->year; $y++)
                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>{{ $y }}</option>
            @endfor
        </select>

        <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Siswa</th>
                    <th>Hadir</th>
                    <th>Izin</th>
                    <th>Sakit</th>
                    <th>Alpha</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensis as $siswa)
                    <tr>
                        <td>{{ $siswa->nama }}</td>
                        <td>{{ $siswa->absensis->where('status', 'hadir')->count() }}</td>
                        <td>{{ $siswa->absensis->where('status', 'izin')->count() }}</td>
                        <td>{{ $siswa->absensis->where('status', 'sakit')->count() }}</td>
                        <td>{{ $siswa->absensis->where('status', 'alpa')->count() }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
