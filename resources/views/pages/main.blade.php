<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halal | {{ $title }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
     <link href="{{ asset('css/pages/bootstrap.min.css') }}" rel="stylesheet">
        <link rel="icon" href="{{ asset('storage/images/icon.png') }}" type="image/x-icon"/>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/pages/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
</head>
  <body class="index-page">
   <header id="header" class="header d-flex p-2 align-items-center fixed-top">
    <div class="container-fluid container-xl position-sb d-flex align-items-justify">
      <a href="index.html" class="logo d-flex align-items-center me-auto">
        <img src="{{ asset('storage/images/halal.png') }}" alt="">
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>

        <li class="nav-item {{ Request::is('/') ? 'active' : '' }} mx-2">
          <a class="nav-link text-light fs-5" aria-current="page" href="/">Home</a>
        </li>
        <li class="nav-item {{ Request::is('/blogs*') ? 'active' : '' }} mx-2">
          <a class= "nav-link text-light fs-5" href="/blogs">Blog</a>
        </li>
         @auth()
         <li class="nav-item dropdown"><a href="#" class="nav-link fs-5 text-light"><span>Welcome back, {{ auth()->user()->name }}</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul style="background-color: white; font-color:black;">
              <li><a class="dropdown-item" href="/dashboard"><h5> My Dashboard</h5></a></li>
              <li><form class="" action="/logout" method="post">
                  @csrf
                <button type="submit" class="dropdown-item fs-4 mx-4">Logout</button>
              </li>
                </form></li>
            </ul>
          </li>
          @else
              <li class="nav-item {{ Request::is('/login') ? 'active' : '' }} mx-2">
          <a class= "nav-link text-light fs-5" href="/login">Login</a>
              </li>
        @endauth
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
        @yield('container')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
<script src="{{ asset('js/pages/main.js') }}"></script>
<script src="{{ asset('js/pages/bootsrap.bundle.min.js') }}"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
</body>
</html>
