@extends('layout.appuser')
@section('title' , 'Beranda')
@section('style')
<style>
    .carousel-caption {
        bottom: 40%;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
    }

    .carousel-caption h1 {
        color: #f6e7ff;
        font-weight: 700;
        letter-spacing: 1px;
        animation: fadeInDown 1s ease;
    }

    .carousel-caption p {
        color: #eed9fa;
        font-size: 1.1rem;
        animation: fadeInUp 1.2s ease;
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .carousel-item::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(46, 7, 63, 0.7), rgba(46, 7, 63, 0.2));
    }

    .carousel-control-prev-icon,
    .carousel-control-next-icon {
        color: rgba(46, 7, 63, 0.6);
    }

    .layanan-card {
        border-radius: 16px;
        background: white;
        transition: transform 0.4s ease, box-shadow 0.4s ease;
    }

    .layanan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(160, 32, 240, 0.2);
    }

    /* Bagian ikon */
    .icon-wrapper  {
        font-size: 32px;
        color: #A020F0;
        /* ungu lembut seperti tema kamu */
        background: rgba(160, 32, 240, 0.1);
        padding: 12px;
        border-radius: 12px;
    }

    .card-title {
        font-size: 1.15rem;
        color: #2E073F;
        letter-spacing: 0.3px;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #7A1CAC, #AD49E1);
        border: none;
        color: white;
        border-radius: 50px;
        transition: 0.3s;
    }

    .btn-gradient:hover {
        opacity: 0.9;
    }

    .data-perpus {
        background: linear-gradient(to right, #1F0033 0%, #4B0082 100%);
        /* padding: 50px 0; */
    }

    .data-perpus p {
        color: rgb(196, 195, 195);
    }

    .data-perpus .col-md-3:hover {
        transition: 0.3s;
        text-shadow: 0 0 10px rgba(255, 255, 255, 0.411);
    }

    .footer-dark {
  background-color: #2a0740; /* ungu gelap seperti gambar */
  font-family: 'Inter', sans-serif;
}

.footer-link {
  color: #dcd2e8;
  text-decoration: none;
}

.footer-link:hover {
  color: white;
}


</style>
@endsection
@section('content')
<div id="carouselExampleInterval" class="carousel slide  carousel-fade" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="5000">
            <img src="https://i.pinimg.com/1200x/dc/5c/71/dc5c71d5913b2ca2b12b993a355c136a.jpg"
                class="d-block w-100 object-fit-cover vh-100" alt="Buku">
            <div class="carousel-caption">
                <h1>Selamat Datang di Perpustakaan Digital Hilmy</h1>
                <p>Temukan ribuan koleksi buku digital dan kegiatan literasi yang menginspirasi.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="https://i.pinimg.com/736x/d3/03/a2/d303a218d5c24be5b47b7992d16c8717.jpg"
                class="d-block w-100 object-fit-cover vh-100" alt="Kegiatan">
            <div class="carousel-caption">
                <h1>Jelajahi Dunia Pengetahuan</h1>
                <p>Belajar, berbagi ide, dan tingkatkan wawasan di ruang baca yang nyaman.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://i.pinimg.com/736x/fd/c7/57/fdc757167e8cdf1b64464dab4d926926.jpg"
                class="d-block w-100 object-fit-cover vh-100" alt="Perpustakaan">
            <div class="carousel-caption">
                <h1>Tempat Belajar yang Nyaman</h1>
                <p>Ruang baca yang tenang dan modern menantimu setiap hari.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<section class="py-4 container vh-100">
    <h1 class="fw-bold text-center my-5">Layanan Perpustakaan</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card layanan-card text-center p-3 border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Pencarian & Infromasi Buku</h5>
                    <p class="card-text text-secondary">
                        Cari buku yang kamu inginkan dan lihat ketersediaannya di perpustakaan kami dengan mudah.
                    </p>
                    <button class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Lihat Kegiatan</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card layanan-card text-center p-3 border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Layanan Keanggotaan</h5>
                    <p class="card-text text-secondary">
                        Daftarkan dirimu menjadi anggota perpustakaan untuk menikmati berbagai fasilitas.
                    </p>
                    <button class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Lihat Kegiatan</button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card layanan-card text-center p-3 border-0 shadow-sm h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Kegiatan & Acara</h5>
                    <p class="card-text text-secondary">
                        Ikuti kegiatan literasi, pelatihan, dan lomba.
                        Lihat poster, tanggal, dan deskripsi lengkapnya.
                    </p>
                    <button class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Lihat Kegiatan</button>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="data-perpus">
    <div class="container text-white d-flex justify-content-center align-items-center">
        <div class="row text-center ">
            <div class="col-md-3 p-5">
                <h1 class="fw-bold mb-0 p-0">15,000+</h1>
                <p class="small">Koleksi Buku</p>
            </div>
            <div class="col-md-3 p-5">
                <h1 class="fw-bold mb-0">5,000+</h1>
                <p class="small">Anggota Aktif</p>
            </div>
            <div class="col-md-3 p-5">
                <h1 class="fw-bold mb-0">250+</h1>
                <p class="small">Kegiatan/Tahun</p>
            </div>
            <div class="col-md-3 p-5">
                <h1 class="fw-bold mb-0">24/7</h1>
                <p class="small">Akses Digital</p>
            </div>
        </div>
    </div>
</section>
<section class="daftar-sekarang py-5">
    <div class="container text-center">
        <h1 class="fw-bold mb-4">Mulai Perjalanan Literasi Anda</h1>
        <p class="">Daftar sekarang dan nikmati akses penuh ke semua koleksi dan layanan perpustakaan digital <br>kami</p>
        <button class="btn btn-gradient mt-2 py-2 px-4 fw-semibold">Daftar Gratis Sekarang</button>
    </div>
</section>


<footer class="py-5 mt-5 footer-dark text-white">
    <div class="container">
    <div class="row gy-4">

        <!-- Logo & Deskripsi -->
        <div class="col-md-3">
            <div class="d-flex align-items-center mb-3">
                <i class="fa-solid fa-book fs-2 me-2"></i>
                <h5 class="mb-0 fw-bold">Perpustakaan Digital</h5>
            </div>
            <p style="color: #dcd2e8;" class="small m-0">Platform perpustakaan modern untuk generasi digital</p>
        </div>
        
        <!-- Navigasi -->
        <div class="col-md-3">
            <h6 class="fw-bold mb-3">Navigasi</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="footer-link">Beranda</a></li>
            <li><a href="#" class="footer-link">Buku</a></li>
            <li><a href="#" class="footer-link">Kegiatan</a></li>
            <li><a href="#" class="footer-link">Koleksi Khusus</a></li>
            </ul>
        </div>

        <!-- Layanan -->
        <div class="col-md-3">
            <h6 class="fw-bold mb-3">Layanan</h6>
            <ul class="list-unstyled small">
            <li><a href="#" class="footer-link">Peminjaman Online</a></li>
            <li><a href="#" class="footer-link">E-Book</a></li>
            <li><a href="#" class="footer-link">Jurnal Digital</a></li>
            <li><a href="#" class="footer-link">Kritik & Saran</a></li>
            </ul>
        </div>

        <!-- Kontak -->
        <div class="col-md-3">
            <h6 class="fw-bold mb-3">Hubungi Kami</h6>
            <ul class="list-unstyled small">
                <li><i class="fa-solid fa-envelope me-2"></i> info@perpustakaan.id</li>
                <li><i class="fa-solid fa-phone me-2"></i> +62 21 1234 5678</li>
                <li><i class="fa-solid fa-location-dot me-2"></i> Jakarta, Indonesia</li>
            </ul>
        </div>
    </div>

    <hr class="border-secondary opacity-25 mt-4">

    <!-- Copyright + Sosmed -->
    <div class="d-flex justify-content-between align-items-center small pt-3">
        <p style="color: #dcd2e8;" class="m-0">© 2024 Perpustakaan Digital. All rights reserved.</p>
        <div class="d-flex gap-3 fs-5">
        <i class="fa-brands fa-facebook"></i>
        <i class="fa-brands fa-twitter"></i>
        <i class="fa-brands fa-instagram"></i>
        <i class="fa-brands fa-youtube"></i>
        </div>
    </div>

    </div>
</footer>
@endsection
