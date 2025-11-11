@extends('layout.appadmin')
@section('title', 'Admin Dashboard')
@section('styles')
    <style>
     
    </style>
@endsection
@section('content')
<div class="container-fluid py-4">
    <div class="text-center mb-4">
        <h4 class="fw-bold">Selamat Datang di Halaman Utama Hilmy Library</h4>
        <h5 class="text-muted">Admin Hilmy Library</h5>
    </div>

    <!-- Statistik Ringkasan -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center rounded-4">
                <div class="card-body">
                    <div class="fs-1 text-primary"><i class="fas fa-users"></i></div>
                    <h5 class="mt-2 mb-0">{{ $anggota }} Anggota</h5>
                    <a href="{{ route('data.pengunjung') }}" class="text-decoration-none small text-primary">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center rounded-4">
                <div class="card-body">
                    <div class="fs-1 text-success"><i class="fas fa-book"></i></div>
                    <h5 class="mt-2 mb-0">{{ $buku }} Buku</h5>
                    <a href="{{ route('data.buku') }}" class="text-decoration-none small text-success">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center rounded-4">
                <div class="card-body">
                    <div class="fs-1 text-info"><i class="fas fa-exchange-alt"></i></div>
                    <h5 class="mt-2 mb-0">{{ $dipinjam }} Dipinjam</h5>
                    <a href="{{ route('data.peminjam') }}" class="text-decoration-none small text-info">Lihat Detail</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card shadow-sm border-0 text-center rounded-4">
                <div class="card-body">
                    <div class="fs-1 text-warning"><i class="fas fa-user-shield"></i></div>
                    <h5 class="mt-2 mb-0">{{ $user }} User</h5>
                    <a href="{{ route('profil') }}" class="text-decoration-none small text-warning">Lihat Detail</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Keterlambatan -->
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-primary text-white rounded-top-4 d-flex justify-content-between align-items-center">
            <h6 class="mb-0"><i class="fas fa-clock me-2"></i>Data Anggota Terlambat Pengembalian Buku</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-middle table-bordered">
                    <thead class="table-light">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Terlambat</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($terlambat as $t)
                        <tr class="text-center">
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $t->nama_pengunjung }}</td>
                            <td>{{ $t->tanggal_pinjam }}</td>
                            <td>{{ $t->tanggal_kembali }}</td>
                            <td class="text-danger fw-bold">{{ $t->hari_terlambat }} hari <br><span class="text-muted small">(Rp. {{ $t->denda }})</span></td>
                            <td><span class="badge bg-warning text-dark">{{ ucwords($t->status) }}</span></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    <footer>
        <p class="text-center text-muted mb-0">&copy 2025 Hilmy Library</p>
    </footer>
@endsection
@section('scripts')
<script>   
// Highlight nav sesuai halaman aktif
    document.addEventListener("DOMContentLoaded", function () {
        let current = window.location.pathname.split("/").pop();
        let links = document.querySelectorAll(".sidebar .nav-link");

        links.forEach(link => {
            let href = link.getAttribute("href");
            if (href.includes(current)) {
                link.classList.add("active-nav");
            } else {
                link.classList.remove("active-nav");
            }
        });
    });

const ctx = document.getElementById('pengunjungChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
            datasets: [{
                label: 'Pengunjung',
                data: [5, 7, 12, 9, 4, 6, 8, 11, 10, 14, 13, 7],
                backgroundColor: '#198754'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: { beginAtZero: true }
            }
        }
    });
    // Highlight nav sesuai halaman aktif
    document.addEventListener("DOMContentLoaded", function () {
        let current = window.location.pathname.split("/").pop();
        let links = document.querySelectorAll(".sidebar .nav-link");

        links.forEach(link => {
            let href = link.getAttribute("href");
            if (href.includes(current)) {
                link.classList.add("active-nav");
            } else {
                link.classList.remove("active-nav");
            }
        });
    });
    </script>
@endsection