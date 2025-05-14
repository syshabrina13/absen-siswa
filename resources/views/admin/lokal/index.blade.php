@extends('templates.layout')
@section('title', 'Data Lokal')
@section('konten')

<div class="row mt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Data Lokal</h4>
                <a href="{{ route('lokal.create') }}" class="btn btn-success mb-3">Tambah Data</a> <!-- Tombol Tambah Data -->
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($lokal as $kelas)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kelas->nama }}</td>
                                <td>
                                    <a href="{{ route('lokal.edit', $kelas->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('lokal.destroy', $kelas->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
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