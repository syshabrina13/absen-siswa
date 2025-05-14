@extends('templates.layout')
@section('title', 'Tambah Data Jurusan')
@section('konten')
<div class="col">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Jurusan</h5>

            <!-- Vertical Form -->
            <form class="row g-3" method="POST" action="{{ route('jurusan.store') }}">
                @csrf
                <div class="col-12">
                    <label for="nama" class="form-label">Nama Jurusan </label>
                    <input type="text" class="form-control" id="nama_jurusan" name="nama_jurusan" placeholder="masukkan nama jurusan" required>
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Kode Jurusan </label>
                    <input type="text" class="form-control" id="kode_jurusan" name="kode_jurusan" placeholder="masukkan nama kode" required>
                </div>
                <div class="text-end">
                    <a href="{{route('jurusan.index')}}" class="btn btn-primary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
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
@section('js')
<script>
    function togglePassword() {
        let passwordInput = document.getElementById("password");
        let eyeIcon = document.getElementById("eyeIcon");

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            eyeIcon.classList.replace("bi-eye", "bi-eye-slash");
        } else {
            passwordInput.type = "password";
            eyeIcon.classList.replace("bi-eye-slash", "bi-eye");
        }
    }
</script>

@endsection