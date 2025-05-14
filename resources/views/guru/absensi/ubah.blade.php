@extends('template-guru.layout')
@section('title', 'Ubah status absen' . $mengabsen->siswa->nama)
@section('konten')

<div class="col-xxl">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Edit Data {{$mengabsen->siswa->nama}}</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('absen.update', $mengabsen->id) }}">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="status">Status Siswa</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="status" name="status">
                            <option value="hadir" {{ $mengabsen->status == 'hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="sakit" {{ $mengabsen->status == 'sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="izin" {{ $mengabsen->status == 'izin' ? 'selected' : '' }}>Izin</option>
                            <option value="alpa" {{ $mengabsen->status == 'alpa' ? 'selected' : '' }}>Alpa</option>

                        </select>
                    </div>
                </div>

                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('absen.index') }}">
                            <button type="button" class="btn btn-primary">Kembali</button>
                        </a>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection