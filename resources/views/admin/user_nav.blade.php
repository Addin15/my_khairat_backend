<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Dashboard</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg fixed-top bg-light navbar-light">
    <div class="container">
      <a class="navbar-brand flex" href="#"
        ><h3>myKhairat</h3></a>
      <button
        class="navbar-toggler"
        type="button"
        data-mdb-toggle="collapse"
        data-mdb-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto align-items-center">
          <li class="nav-item">
            <a class="nav-link mx-2" href="{{ route('admin.dashboard') }}"><i class="fas fa-bell pe-2"></i>Member Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="{{ route('admin.payment') }}"><i class="fas fa-bell pe-2"></i>Member Payment</a>
          </li>
          <li class="nav-item">
            <a class="nav-link mx-2" href="{{ route('admin.bank') }}"><i class="fas fa-heart pe-2"></i>Bank Details</a>
          </li>
          <li class="nav-item ms-3">
            <button class="btn"><a href="{{ route('admin.logout') }}">Logout</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Navbar -->

  @yield('content')
</body>

</html>