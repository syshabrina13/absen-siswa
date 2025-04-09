<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('src/assets/css/styles.min.css')}}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="{{asset('index.html')}}" class="text-nowrap logo-img">
            <img src="{{asset('src/assets/images/logos/logo.svg')}}" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <iconify-icon icon="solar:menu-dots-linear" class="nav-small-cap-icon fs-4"></iconify-icon>
              <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{asset('index.html')}}" aria-expanded="false">
                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('siswa.index') }}" aria-expanded="false">
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
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link" href="javascript:void(0)" id="drop1" data-bs-toggle="dropdown" aria-expanded="false">
                <iconify-icon icon="solar:bell-linear" class="fs-6"></iconify-icon>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
              <div class="dropdown-menu dropdown-menu-animate-up" aria-labelledby="drop1">
                <div class="message-body">
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 1
                  </a>
                  <a href="javascript:void(0)" class="dropdown-item">
                    Item 2
                  </a>
                </div>
              </div>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="{{asset('src/assets/images/profile/user-1.jpg')}}" alt="" width="35" height="35" class="rounded-circle">
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
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-list-check fs-6"></i>
                      <p class="mb-0 fs-3">My Task</p>
                    </a>
                    <a href="{{asset('authentication-login.html')}}" class="btn btn-outline-primary mx-3 mt-2 d-block">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          <div class="row">
            <div class="col-lg-8 d-flex align-items-strech">
              <div class="card w-100">
                <div class="card-body">
                  <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                    <div class="mb-3 mb-sm-0">
                      <h5 class="card-title fw-semibold">Sales Profit</h5>
                    </div>
                    <div>
                      <select class="form-select">
                        <option value="1">March 2025</option>
                        <option value="2">April 2025</option>
                        <option value="3">May 2025</option>
                        <option value="4">June 2025</option>
                      </select>
                    </div>
                  </div>
                  <div id="sales-profit"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card bg-danger-subtle shadow-none w-100">
                    <div class="card-body">
                      <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-6">
                          <div class="rounded-circle-shape bg-danger px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="solar:users-group-rounded-bold-duotone" class="fs-7 text-white"></iconify-icon>
                          </div>
                          <h6 class="mb-0 fs-4 fw-medium text-muted">Total followers</h6>
                        </div>
                        <div class="dropdown dropstart">
                          <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-plus"></i>Add</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="row align-items-end justify-content-between">
                        <div class="col-5">
                          <h2 class="mb-6 fs-8">4,562</h2>
                          <span class="badge rounded-pill border border-muted fw-bold text-muted fs-2 py-1">+23% last month</span>
                        </div>
                        <div class="col-5">
                          <div id="total-followers" class="rounded-bars"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="card bg-secondary-subtle shadow-none w-100">
                    <div class="card-body">
                      <div class="d-flex mb-10 pb-1 justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-6">
                          <div class="rounded-circle-shape bg-secondary px-3 py-2 rounded-pill d-inline-flex align-items-center justify-content-center">
                            <iconify-icon icon="solar:wallet-2-line-duotone" class="fs-7 text-white"></iconify-icon>
                          </div>
                          <h6 class="mb-0 fs-4 fw-medium text-muted">Total Income</h6>
                        </div>
                        <div class="dropdown dropstart">
                          <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="ti ti-dots-vertical fs-6"></i>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-plus"></i>Add</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-edit"></i>Edit</a>
                            </li>
                            <li>
                              <a class="dropdown-item d-flex align-items-center gap-3" href="javascript:void(0)"><i class="fs-4 ti ti-trash"></i>Delete</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <div class="row align-items-center justify-content-between pt-4">
                        <div class="col-5">
                          <h2 class="mb-6 fs-8 text-nowrap">$6,280</h2>
                          <span class="badge rounded-pill border border-muted fw-bold text-muted fs-2 py-1">+18% last month</span>
                        </div>
                        <div class="col-5">
                          <div id="total-income"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="py-6 px-6 text-center">
            <p class="mb-0 fs-4">Design and Developed by <a href="https://www.wrappixel.com/" target="_blank" class="pe-1 text-primary text-decoration-underline">Wrappixel.com</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{asset('src/assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('src/assets/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('src/assets/js/app.min.js')}}"></script>
  <script src="{{asset('src/assets/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('src/assets/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('src/assets/js/dashboard.js')}}"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>