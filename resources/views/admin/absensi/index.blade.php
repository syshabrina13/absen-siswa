@extends('templates.layout')
@section('title', 'Data Guru')
@section('konten')

<div class="card">
    <h5 class="card-header">Management Data Absen</h5>
    <div class="card-body">
        <form method="GET" action="{{ route('absen.index') }}">
            <div class="row mb-3">
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
                <div class="col-md-4">
                    <input type="date" name="tanggal_absen" class="form-control" value="{{ request('tanggal_absen') }}">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary">Filter</button>
                </div>
            </div>
        </form>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead class="text-center">
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Status</th>
                <th>Tanggal Absen</th>
                <th>Jam Absen</th>
                <th>Guru yang Mengabsen</th>
                <th>Aksi</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach($dataabsen->sortByDesc('tanggal_absen') as $da)
                <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$da->siswa->nama}}</td>
                <td>{{$da->siswa->lokal->nama}}</td>
                <td>{{$da->status}}</td>
                <td>{{$da->tanggal_absen}}</td>
                <td>{{$da->jam_absen}}</td>
                <td>{{$da->guru->nama}}</td>
                <td>
                    <div class="action-btns">
                      
                    <form action="{{ route('absen.destroy', $da->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class='btn btn-outline-danger btn-sm' onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class='far fa-trash-alt' title="hapus"></i></button>
                    </form>
                    </div>
                </td>
                </tr>
                @endforeach
            </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#dataTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'excel', 'pdf', 'print'
            ]
        });
    });
</script>
@endsection