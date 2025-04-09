<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Data Siswa</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('src/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('src/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{ url('/Admin') }}" class="text-nowrap logo-img">
            <img src="{{ asset('src/assets/images/logos/logo.svg') }}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/Admin') }}" aria-expanded="false">
                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/data-siswa') }}" aria-expanded="false">
                <iconify-icon icon="solar:users-group-rounded-bold-duotone"></iconify-icon>
                <span class="hide-menu">Data Siswa</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/data-guru') }}" aria-expanded="false">
                <iconify-icon icon="solar:account"></iconify-icon>
                <span class="hide-menu">Data Guru</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/data-kelas') }}" aria-expanded="false">
                <iconify-icon icon="solar:school"></iconify-icon>
                <span class="hide-menu">Data Kelas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ url('/data-jurusan') }}" aria-expanded="false">
                <iconify-icon icon="solar:book"></iconify-icon>
                <span class="hide-menu">Data Jurusan</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>
    <!-- Sidebar End -->

    <!-- Main Content -->
    <div class="body-wrapper">
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{ asset('src/assets/images/profile/user-1.jpg') }}" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-mail fs-6"></i>
                      <p class="mb-0 fs-3">My Account</p>
                    </a>
                    <a href="{{ route('logout') }}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Data Siswa</h4>
                <a href="{{ route('siswa.create') }}" class="btn btn-success mb-3">Tambah Data</a> <!-- Tombol Tambah Data -->
                <div class="table-responsive">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>NIS</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($siswa as $student)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $student->nama }}</td>
                        <td>{{ $student->nisn }}</td>
                        <td>{{ $student->id_kelas }}</td>
                        <td>{{ $student->id_jurusan }}</td>
                        <td>
                          <a href="{{ route('siswa.edit', $student->id) }}" class="btn btn-primary btn-sm">Edit</a>
                          <form action="{{ route('siswa.destroy', $student->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
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
      </div>
    </div>
  </div>

  <script src="{{ asset('src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('src/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('src/assets/js/app.min.js') }}"></script>
</body>

</html>