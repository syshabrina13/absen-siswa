<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Login Admin - SekolahTime</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('src/assets/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('src/assets/css/styles.min.css')}}" />

  <style>
    /* Background gradient */
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #3a8dff, #17c3b2);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #222;
    }

    /* Card style */
    .card {
      background: #fff;
      border-radius: 16px;
      box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
      padding: 40px 30px;
      width: 360px;
      max-width: 90vw;
      text-align: center;
    }

    /* Logo wrapper */
    .logo-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 14px;
      margin-bottom: 24px;
      cursor: pointer;
      text-decoration: none;
      user-select: none;
    }

    /* Logo circle with animated clock */
    .logo-clock {
      width: 56px;
      height: 56px;
      background: linear-gradient(135deg, #17c3b2, #3a8dff);
      border-radius: 50%;
      position: relative;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.25);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: 900;
      font-size: 24px;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      overflow: visible;
    }

    /* Clock hands */
    .logo-clock::before,
    .logo-clock::after {
      content: "";
      position: absolute;
      background: white;
      border-radius: 2px;
      top: 50%;
      left: 50%;
      transform-origin: bottom center;
      transform-style: preserve-3d;
      box-shadow: 0 0 3px rgba(255 255 255 / 0.9);
    }

    .logo-clock::before {
      width: 4px;
      height: 18px;
      transform: translate(-50%, -100%) rotate(45deg);
      animation: hand-rotate 4s linear infinite;
    }

    .logo-clock::after {
      width: 4px;
      height: 12px;
      transform: translate(-50%, -100%) rotate(90deg);
      animation: hand-rotate 60s linear infinite reverse;
    }

    @keyframes hand-rotate {
      from {
        transform: translate(-50%, -100%) rotate(0deg);
      }
      to {
        transform: translate(-50%, -100%) rotate(360deg);
      }
    }

    /* Logo text with gradient */
    .logo-text {
      font-size: 32px;
      font-weight: 900;
      background: linear-gradient(90deg, #17c3b2, #3a8dff);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-family: 'Poppins', sans-serif;
    }

    /* Subtitle */
    .login-subtitle {
      font-weight: 600;
      font-size: 1.05rem;
      color: #555;
      margin-bottom: 28px;
    }

    /* Form styling */
    form {
      text-align: left;
    }

    label {
      font-weight: 600;
      font-size: 0.9rem;
      margin-bottom: 6px;
      display: block;
      color: #444;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 12px 14px;
      margin-bottom: 20px;
      border: 2px solid #ddd;
      border-radius: 10px;
      font-size: 1rem;
      transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #3a8dff;
      box-shadow: 0 0 8px rgba(58, 141, 255, 0.5);
    }

    /* Checkbox and forgot password */
    .form-check {
      display: flex;
      align-items: center;
      gap: 6px;
    }

    .form-check label {
      font-weight: 500;
      color: #333;
      user-select: none;
    }

    .d-flex.justify-content-between.mb-4 {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 24px;
    }

    .text-primary {
      color: #3a8dff !important;
      font-weight: 600;
      text-decoration: none;
      transition: color 0.3s ease;
      cursor: pointer;
    }

    .text-primary:hover {
      color: #17c3b2 !important;
    }

    /* Submit button */
    button[type="submit"] {
      background: linear-gradient(90deg, #17c3b2, #3a8dff);
      color: white;
      font-weight: 700;
      font-size: 1.15rem;
      padding: 14px;
      border: none;
      border-radius: 14px;
      width: 100%;
      cursor: pointer;
      box-shadow: 0 6px 15px rgba(23, 195, 178, 0.6);
      transition: background 0.4s ease, box-shadow 0.4s ease;
    }

    button[type="submit"]:hover {
      background: linear-gradient(90deg, #3a8dff, #17c3b2);
      box-shadow: 0 8px 20px rgba(58, 141, 255, 0.7);
    }

    /* Bottom signup text */
    .bottom-text {
      margin-top: 30px;
      font-size: 1rem;
      display: flex;
      justify-content: center;
      gap: 8px;
      user-select: none;
    }

    .bottom-text p {
      margin: 0;
      font-weight: 600;
      color: #444;
    }

    /* Responsive */
    @media (max-width: 400px) {
      .card {
        width: 90vw;
        padding: 30px 20px;
      }
      .logo-text {
        font-size: 26px;
      }
    }
  </style>
</head>

<body>
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden min-vh-100 d-flex align-items-center justify-content-center">
      <div class="card">
        <a href="{{asset('./index.html')}}" class="logo-wrapper" aria-label="SekolahTime Home">
          <div class="logo-clock" aria-hidden="true">S</div>
          <span class="logo-text">SekolahTime</span>
        </a>

        <p class="login-subtitle">Sistem Absensi Siswa Modern dan Praktis</p>

        <form action="{{route('auth')}}" method="POST" autocomplete="off">
          @csrf
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required autocomplete="username" />

          <label for="password">Password</label>
          <input type="password" id="password" name="password" required autocomplete="current-password" />

          <div class="d-flex justify-content-between mb-4">
            <div class="form-check">
              <input class="form-check-input primary" type="checkbox" value="" id="remember" checked />
              <label class="form-check-label" for="remember">Remember this Device</label>
            </div>
            <a class="text-primary fw-bold" href="{{asset('./index.html')}}">Forgot Password?</a>
          </div>

          <button type="submit">Sign In</button>
        </form>

        <div class="bottom-text">
          <p>New to SekolahTime?</p>
          <a class="text-primary fw-bold" href="{{asset('./authentication-register.html')}}">Create an account</a>
        </div>
      </div>
    </div>
  </div>

  <script src="{{asset('assets/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>
