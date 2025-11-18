@extends('layout.appuser')
@section('title', 'Kegiatan Perpustakaan')
@php
    use Carbon\Carbon;
@endphp
@section('style')
<style>
    .hero-kegiatan {
        height: 45vh;
        background: url('https://i.pinimg.com/736x/d3/03/a2/d303a218d5c24be5b47b7992d16c8717.jpg') center/cover no-repeat;
        position: relative;
    }

    .hero-kegiatan::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(46, 7, 63, 0.85), rgba(46, 7, 63, 0.3));
    }

    .hero-text {
        position: absolute;
        bottom: 20%;
        color: #f6e7ff;
        text-shadow: 0 3px 10px rgba(0,0,0,0.5);
    }

    .event-card {
        border-radius: 16px;
        overflow: hidden;
        transition: 0.3s;
        border: none;
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0px 10px 18px rgba(160, 32, 240, 0.2);
    }
    .img-event {
        height: 220px;               /* tinggi preview card */
        width: 100%;
        object-fit: cover;           /* biar tidak gepeng */
        object-position: center;     /* crop tengah paling rapi */
        border-radius: 12px 12px 0 0;
    }


    .btn-gradient {
        background: linear-gradient(90deg, #7A1CAC, #AD49E1);
        border: none;
        color: white;
        border-radius: 8px;
    }
    .footer-dark {
        background-color: #2a0740;
        /* ungu gelap seperti gambar */
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

<!-- HERO -->
<div class="hero-kegiatan d-flex justify-content-center align-items-center">
    <div class="hero-text text-center">
        <h1 class="fw-bold">Kegiatan & Acara Perpustakaan</h1>
        <p class="mt-2">Ikuti berbagai kegiatan menarik setiap minggunya</p>
    </div>
</div>

<div class="container py-5">
    
    <h2 class="fw-bold text-center mb-4">Kegiatan Terbaru</h2>

    <div class="row g-4">
        @foreach ($kegiatan as $k)    
        
        <div class="col-md-4">
            <div class="card event-card shadow-sm h-100">
                @if ($k->gambar)
                    <img src="{{ asset('uploads/kegiatan/'. $k->gambar) }}" class="card-img-top img-event" alt="Event">
                @else
                    <div class="text-center bg-light d-flex flex-column justify-content-center align-items-center img-event">
                        <i class="fas fa-images text-muted fs-1 mb-3"></i>
                        <h5 class="text-muted small">Tidak Ada Poster Informasi</h5>
                    </div>    
                @endif
                <div class="card-body">
                    <h5 class="fw-bold">{{ $k->nama_kegiatan }}</h5>
                    <p class="text-secondary small mb-1">
                        <i class="fa-solid fa-calendar me-1"></i> 
                            {{ Carbon::parse($k->tanggal_mulai)->translatedFormat('d F Y') }}
                            s/d 
                            {{ Carbon::parse($k->tanggal_selesai)->translatedFormat('d F Y') }}
                    </p>
                    <p class="card-text text-secondary mb-1">
                        <i class="fas fa-map-location"></i> {{$k->lokasi}}
                    </p>
                    <p class="card-text text-secondary"><i class="fas fa-tag"></i> {{ $k->kategori }}</p>
                    <a href="{{ route('detail.kegiatan.user', $k->id) }}" class="btn btn-gradient w-100 mt-2">Lihat Detail</a>
                </div>
            </div>
        </div>
        @endforeach
        
    <!-- Lihat Semua -->
    <div class="text-center mt-5">
        {{ $kegiatan->links('pagination::bootstrap-5') }}
    </div>
    </div>
</div>

@include('partials.footer')
@endsection
