<!-- CSS untuk logo SekolahTime -->
<style>
  .logo-wrapper {
    display: flex;
    align-items: center;
    text-decoration: none;
  }

  .logo-clock {
    width: 40px;
    height: 40px;
    background: linear-gradient(135deg, #198754, #0dcaf0); /* hijau ke biru muda */
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: bold;
    font-size: 16px;
    margin-right: 10px;
    box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    position: relative;
  }

  /* Jarum jam vertikal */
  .logo-clock::before {
    content: "";
    width: 2px;
    height: 10px;
    background: white;
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    border-radius: 1px;
  }

  /* Jarum jam horizontal */
  .logo-clock::after {
    content: "";
    width: 2px;
    height: 6px;
    background: white;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: rotate(90deg) translateX(-50%);
    transform-origin: center;
    border-radius: 1px;
  }

  /* Teks SekolahTime dengan efek gradient warna */
  .logo-text {
    font-size: 20px;
    font-weight: 800;
    background: linear-gradient(90deg, #198754, #0dcaf0);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    letter-spacing: 0.5px;
    user-select: none;
  }
</style>

<!-- HTML Logo dan Sidebar Navigation -->
<div>
  <div class="brand-logo d-flex align-items-center justify-content-between px-3 py-2">
    <a href="{{ asset('index.html') }}" class="logo-wrapper">
      <div class="logo-clock"></div>
      <span class="logo-text">SekolahTime</span>
    </a>
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
