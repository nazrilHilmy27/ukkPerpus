<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Admin Page')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    {{-- data table --}}
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('DataTables/datatables.min.css') }}">
    @yield('styles')
</head>

<body>

    <div class="row container-fluid g-0">
        <!-- Sidebar -->
        <div class="col-md-2 sidebar p-3 position-sticky" style="top: 0;">
            <!-- Profil Admin -->
            <div class="profile text-center mb-4">
                <!-- Avatar Font Awesome -->
                <div class="avatar-circle mb-2" >
                    <a href="{{ route('profil') }}" class="profile-name text-decoration-none text-white d-block mb-1">    
                    <i class="fas fa-user"></i>
                    </a>
                </div>
                <a href="{{ route('profil') }}" class="profile-name text-decoration-none d-block mb-1">
                    <h6 class="mb-0 text-white">Nazril Hilmy</h6>
                </a>
                <span class="badge bg-warning text-dark">Admin</span>
            </div>


            <!-- Menu -->
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data.peminjam') }}">
                        <i class="fas fa-book"></i> Data Peminjaman
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data.pengunjung') }}">
                        <i class="fas fa-users"></i> Data Pengunjung
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('data.buku') }}">
                        <i class="fas fa-book-open"></i>  Data Buku
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('koleksi.khusus') }}">
                        <i class="fas fa-folder-open"></i>  Koleksi Khusus
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('kegiatan.index') }}">
                        <i class="fas fa-calendar-days"></i>  Kegiatan
                    </a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <main class="col-md-10 p-4">
            @yield('content')
        </main>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
