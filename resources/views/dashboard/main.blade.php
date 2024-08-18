<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="{{ asset('storage/images/logo-halal-aksara-arab.webp') }}">
    {{-- Css --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link rel="icon" href="{{ asset('storage/images/icon.png') }}" type="image/x-icon" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/dashboard/font.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard/toastify.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    @stack('style')

    {{-- @stack('dashboard') --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Halal | {{ $title }}</title>

</head>

<body id="page-top">
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon">
                    <i class="bi bi-house-fill"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Dashboard</div>
            </a>
            <hr class="sidebar-divider my-0">
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="/dashboard">
                    <i class="bi bi-person-fill"></i>
                    <span>Profile</span></a>
            </li>
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Blog
            </div>
            <li class="nav-item {{ Request::is('dashboard/blogs*') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="bi bi-clipboard-fill"></i>
                    <span>Blog</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Blog</h6>
                        <a class="collapse-item" href="/dashboard/blogs">My Blog</a>
                        <a class="collapse-item" href="/blogs">
                            <span>All Blog</span></a>
                    </div>
                </div>
            </li>
            <li class="nav-item {{ Request::is('blogs/*') ? 'active' : '' }}">
            </li>
            <hr class="sidebar-divider">
            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button type="submit" class="nav-link">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Logout</span></button>
                </form>
            </li>
            <hr class="sidebar-divider">
        </ul>


        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="bi bi-list"></i>
                    </button>
                    <ul class="navbar nav ml-auto justify-content-start">
                        <li class="nav-item dropdown no-arrow">
                            <span class="mr-2 text-gray-600 small">{{ auth()->user()->name }}</span>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ $date }}</span>
                        </li>
                    </ul>
                </nav>
                <div class="container-fluid">

                    @yield('container.dashboard')

                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="bi bi-arrow-up-circle"></i>
                    </a>
                </div>
            </div>

            <script src="{{ asset('js/dashboard/jquery.min.js') }}"></script>
            <script src="{{ asset('js/dashboard/bootstrap.bundle.min.js') }}"></script>
            <script src="{{ asset('js/dashboard/jquery.easing.min.js') }}"></script>
            <script src="{{ asset('js/dashboard/sb-admin-2.min.js') }}"></script>



            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
                integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
                crossorigin="anonymous">
            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

            @stack('scripts')


</body>

</html>