<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Selamat Datang')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">

    @yield('style')
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom shadow">
        <div class="container-fluid p-1">
            <!-- Logo -->
            <div class="d-flex align-items-center ms-5">
                <div class="bg-opacity-25 bg-light rounded-2 me-2" style="padding: 10px">
                    <i class="fas fa-book-open logo-icon"></i>
                </div>
                <div>
                    <div class="fw-bold fs-5" style="color: #EBD3F8;">Perpustakaan</div>
                    <div class="text-white-50" style="font-size: 13px;">Hilmy</div>
                </div>
            </div>

            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu -->
            <div class="collapse navbar-collapse justify-content-end me-5" id="navbarText">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('daftar.buku') }}">Daftar Buku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kegiatan') }}">Kegiatan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('koleksi.khusus.user') }}">Koleksi Khusus</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('kritik.saran') }}">Kritik & Saran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    @yield('script')
</body>

</html>
