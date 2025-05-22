@extends('template-siswa.layout')
@section('title', 'Mengajukan')
@section('konten')
<div class="col">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Mengajukan</h5>

            <!-- Vertical Form -->
            <form class="row g-3" method="POST" action="{{ route('pengajuan.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="col-12">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <textarea class="form-control" id="keterangan" name="keterangan" placeholder="masukkan keterangan" required></textarea>
                </div>
                <div class="col-12">
                    <label for="foto" class="form-label">Foto</label>
                    <input type="file" class="form-control" id="foto" name="foto" required >
                </div>

                <div class="text-end">
                    <a href="{{route('siswa.index')}}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <a href="{{ route('pengajuan.index') }}">Pengajuan</a>
                    <button type="reset" class="btn btn-warning">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </button>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form><!-- Vertical Form -->

        </div>
    </div>
</div>
@endsection