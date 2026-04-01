@extends('layout.appuser')
@section('title' , 'Beranda')
@section('style')
<style>
    .carousel-item {
        height: 500px;
        position: relative;
    }

    .carousel-item img {
        height: 100%;
        width: 100%;
        object-fit: cover;
    }
    .carousel-caption {
        bottom: 35%;
        text-shadow: 0 2px 8px rgba(0, 0, 0, 0.5);
        z-index: 2;
    }

    .carousel-caption h1 {
        color: #ffffff;
        font-weight: 700;
        letter-spacing: 1px;
        animation: fadeInDown 1s ease;
    }

    .carousel-caption p {
        color: #ffffff;
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
        background: linear-gradient(
            to top,
            rgba(74, 3, 117, 0.75),
            rgba(74, 3, 117, 0.25),
            rgba(0,0,0,0.1)
        );
    }


    .layanan-card {
        border-radius: 16px;
        box-shadow: 0 3px 18px rgba(160, 32, 240, 0.2);
        transition: 0.4s ease;
    }

    .layanan-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 18px rgba(160, 32, 240, 0.2);
    }

    /* Bagian ikon */
    .icon-wrapper  {
        font-size: 32px;
        color: #A020F0;
        background: rgba(160, 32, 240, 0.1);
        padding: 10px 13px;
        border-radius: 12px;
    }

    .card-title {
        font-size: 1.15rem;
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
        background: linear-gradient(to right, #4f0580 0%, #7004bd 100%);
        text-align: center;
    }
    .data-perpus .container{
        padding: 20px 0;
    }
    .data-perpus p {
        color: rgb(196, 195, 195);
        line-height: 0;
    }

    .data-perpus .col-sm-3:hover {
        transition: 0.2s;
        text-shadow: 0 0 15px rgba(255, 255, 255, 0.411);
    }

    /* footer css */
    .footer-dark {
        background-color: #4a0375; 
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
        <div class="carousel-item active" data-bs-interval="3000">
            <img src="{{ asset('img/gambar1.jpg') }}"  alt="Buku">
            <div class="carousel-caption">
                <h1>Selamat Datang di Perpustakaan Digital Hilmy</h1>
                <p>Temukan ribuan koleksi buku digital dan kegiatan literasi yang menginspirasi.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="{{ asset('img/gambar2.jpg') }}"  alt="Kegiatan">
            <div class="carousel-caption">
                <h1>Jelajahi Dunia Pengetahuan</h1>
                <p>Belajar, berbagi ide, dan tingkatkan wawasan di ruang baca yang nyaman.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="3000">
            <img src="{{ asset('img/gambar3.jpg') }}"  alt="Perpustakaan">
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

<section class="py-4 container">
    <h1 class="fw-bold text-center my-5">Layanan Perpustakaan</h1>
    <div class="row">
        <div class="col-md-4 pb-5">
            <div class="card layanan-card text-center p-3 border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-search"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Pencarian & Infromasi Buku</h5>
                    <p class="card-text text-secondary">
                        Cari buku yang kamu inginkan dan lihat ketersediaannya di perpustakaan kami dengan mudah.
                    </p>
                    <a href="{{route('daftar.buku')}}" class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Lihat Daftar Buku</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 pb-5">
            <div class="card layanan-card text-center p-3 border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Layanan Keanggotaan</h5>
                    <p class="card-text text-secondary">
                        Daftarkan dirimu menjadi anggota perpustakaan untuk menikmati berbagai fasilitas.
                    </p>
                    <a href="{{route('daftar.anggota')}}" class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Daftar Anggota</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 pb-5">
            <div class="card layanan-card text-center p-3 border-0 h-100">
                <div class="card-body d-flex flex-column justify-content-between">
                    <div class="icon-wrapper mx-auto mb-3">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Kegiatan & Acara</h5>
                    <p class="card-text text-secondary">
                        Ikuti kegiatan literasi, pelatihan, dan lomba. Lihat poster, tanggal, dan deskripsi lengkapnya.
                    </p>
                    <a href="{{route('kegiatan')}}" class="btn btn-gradient mt-2 px-4 py-2 fw-semibold">Lihat Kegiatan</a>
                </div>
            </div>

        </div>
    </div>
</section>

<section class="data-perpus">
    <div class="container text-white ">
        <div class="row ">
            <div class="col-sm-3">
                <h1 class="fw-bold ">15,000+</h1>
                <p class="small">Koleksi Buku</p>
            </div>
            <div class="col-sm-3">
                <h1 class="fw-bold ">5,000+</h1>
                <p class="small">Anggota Aktif</p>
            </div>
            <div class="col-sm-3">
                <h1 class="fw-bold ">250+</h1>
                <p class="small">Kegiatan/Tahun</p>
            </div>
            <div class="col-sm-3">
                <h1 class="fw-bold ">24/7</h1>
                <p class="small">Akses Digital</p>
            </div>
        </div>
    </div>
</section>
<section class="daftar-sekarang py-5">
    <div class="container text-center">
        <h1 class="fw-bold mb-4">Mulai Perjalanan Literasi Anda</h1>
        <p class="">Daftar sekarang dan nikmati akses penuh ke semua koleksi dan layanan perpustakaan digital <br>kami</p>
        <a href="{{route('daftar.anggota')}}" class="btn btn-gradient mt-2 py-2 px-4 fw-semibold">Daftar Gratis Sekarang</a>
    </div>
</section>


@include('partials.footer')
@endsection
