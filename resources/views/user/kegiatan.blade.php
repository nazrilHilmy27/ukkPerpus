@extends('layout.appuser')
@section('title', 'Kegiatan Perpustakaan')
@php
    use Carbon\Carbon;
@endphp
@section('style')
<style>
    .hero-kegiatan {
        height: 300px;
        background: url('{{ asset('img/gambar2.jpg') }}') center/cover no-repeat;
        position: relative;
    }

    .hero-kegiatan::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(46, 7, 63, 0.589), rgba(46, 7, 63, 0.199));
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
        box-shadow: 0 4px 10px rgba(122, 28, 172, 0.15);
    }

    .event-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(122, 28, 172, 0.25);
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
            <div class="card event-card h-100">
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
        
        <!-- Paginate -->
        <div class="mt-5">
            {{ $kegiatan->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>

@include('partials.footer')
@endsection
