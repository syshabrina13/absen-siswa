@extends('template-guru.layout')
@section('title', 'Dashboard Guru')
@section('konten')

<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <h4 class="mb-3">Selamat Datang, </h4>
                    <p>Silahkan klik menu <strong>Absensi</strong> untuk mulai mengabsensi siswa.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Announcements Section -->
        <div class="col-lg-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h5 class="mb-0">Petunjuk</h5>
                </div>
                <div class="panel-body">
                    <ul>
                        <li>Pastikan untuk mengisi absensi harian sebelum pukul 09:00 WIB.</li>
                        <li>Klik menu "Absensi" di sebelah kanan, lalu pilih tombol "Absen Siswa" untuk mulai mengabsen.</li>
                        <li>Sebelum mengisi absen, pastikan untuk memilih filter "Kelas" sesuai dengan kelas yang akan diabsen terlebih dahulu.</li>
                        <li>Pastikan saat mengisi absen, semua siswa yang hadir dicentang "Hadir", dan siswa yang tidak hadir dicentang "Alpa".</li>
                        <li>Bagi siswa yang sakit tetapi belum ada izin dari wali kelas, akan tetap terhitung "Alpa". Jika izin sudah diberikan, sistem akan otomatis mengubah status menjadi "Sakit".</li>
                        <li>Jangan lupa untuk menyimpan data setelah selesai mengisi absen.</li>
                        <li>Pastikan untuk memeriksa kembali data sebelum menyimpan.</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection