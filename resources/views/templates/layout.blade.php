<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('src/assets/css/styles.min.css')}}" />
  @yield('css')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
     @include('templates.sidebar')
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->

    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
     @include('templates.header')
      </header>
      <!--  Header End -->

      <div class="body-wrapper-inner">
        <div class="container-fluid">
          <!--  Row 1 -->
          @yield('konten') 

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