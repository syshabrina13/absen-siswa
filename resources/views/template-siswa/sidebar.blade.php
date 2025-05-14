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
              <a class="sidebar-link" href="{{route('dashboard-siswa')}}" aria-expanded="false">
                <iconify-icon icon="solar:atom-line-duotone"></iconify-icon>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('pengajuan.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:document-text-line-duotone"></iconify-icon>
                <span class="hide-menu">Pengajuan</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="{{ route('rekap.index') }}" aria-expanded="false">
                <iconify-icon icon="solar:clipboard-check-line-duotone"></iconify-icon>
                <span class="hide-menu">Lihat Rekap Absen</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
