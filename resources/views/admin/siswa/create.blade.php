@extends('templates.layout')
@section('title','Data Siswa')
@section('konten')
<div class="col">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Tambah Data Siswa</h5>

            <!-- Vertical Form -->
            <form class="row g-3" method="POST" action="{{ route('siswa.store') }}">
                @csrf
                <div class="col-12">
                    <label for="nisn" class="form-label">Nisn</label>
                    <input type="number" class="form-control" id="nisn" name="nisn" placeholder="masukkan nisn" required>
                </div>
                <div class="col-12">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="masukkan nama" required>
                </div>
                <div class="col-12">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password" required>
                        <span class="input-group-text" onclick="togglePassword()">
                            <i id="eyeIcon" class="bi bi-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="col-12">
                    <label for="kelas" class="form-label">Kelas</label>
                    <select name="id_lokal" id="id_lokal" class="form-control" required>
                        <option disabled selected value="">Pilih Kelas</option>
                        @foreach($kelas as $k)
                        <option value="{{$k['id']}}">{{$k['nama']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12">
                    <label for="jk" class="form-label">Jenis Kelamin</label>
                    <select name="jk" id="jk" class="form-control" required>
                        <option disabled selected value="">Pilih Jenis Kelamin</option>
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </div>
                <div class="col-12">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" placeholder="masukkan alamat" required></textarea>
                </div>
                <div class="col-12">
                    <label for="nohp" class="form-label">Nomor Handphone</label>
                    <input type="number" class="form-control" id="nohp" name="nohp" placeholder="masukkan nohp" required>
                </div>
                <div class="col-12">
                    <label for="nama_wm" class="form-label">Nama WaliMurid</label>
                    <input type="text" class="form-control" id="nama_wm" name="nama_wm" placeholder="masukkan nama walimurid" required>
                </div>
                <div class="col-12">
                    <label for="alamat_wm" class="form-label">Alamat WaliMurid</label>
                    <textarea name="alamat_wm" id="alamat_wm" class="form-control" placeholder="masukkan alamat walimurid" required></textarea>
                </div>
                <div class="col-12">
                    <label for="nohp_wm" class="form-label">Nomor Handphone WaliMurid</label>
                    <input type="number" class="form-control" id="nohp_wm" name="nohp_wm" placeholder="masukkan nohp walimurid" required>
                </div>
                <input type="hidden" name="id_user" value="3">
                <div class="text-end">
                    <a href="{{route('siswa.index')}}" class="btn btn-primary">
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