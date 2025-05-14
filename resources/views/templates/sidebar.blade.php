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
              <a class="sidebar-link" href="{{route('Admin')}}" aria-expanded="false">
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
              <a class="sidebar-link" href="{{ route('guru.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:account"></iconify-icon>
                <span class="hide-menu">Data Guru</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('lokal.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:school"></iconify-icon>
                <span class="hide-menu">Data Kelas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('jurusan.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:school"></iconify-icon>
                <span class="hide-menu">Data Jurusan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('user.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:book"></iconify-icon>
                <span class="hide-menu">Data User</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('absen.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:book"></iconify-icon>
                <span class="hide-menu">Data Absen</span>
              </a>
            </li>
          </ul>
        </nav>
        <!-- End Sidebar navigation -->
      </div>