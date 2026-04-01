@extends('layout.appuser')
@section('title', 'Koleksi Khusus')
@section('style')
<style>
    .hero-koleksi {
        height: 300px;
        background: url('{{ asset('img/gambar3.jpg') }}') center/cover no-repeat;
        position: relative;
    }

    .hero-koleksi::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(46, 7, 63, 0.425), rgba(46, 7, 63, 0.3));
    }

    .hero-text {
        position: absolute;
        bottom: 20%;
        color: #f6e7ff;
        text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
    }

    .book-card {
        border-radius: 18px;
        overflow: hidden;
        background: #fff;
        border: none;
        transition: .3s;
        box-shadow: 0 4px 10px rgba(122, 28, 172, 0.15);
    }

    .book-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(122, 28, 172, 0.25);
    }

    .book-preview {
        height: 240px;
        width: 100%;
        overflow: hidden;
        background: #f5e8ff;
        border-radius: 18px 18px 0 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    /* Thumbnail file */
    .book-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Label kategori */
    .label-badge {
        display: inline-block;
        background: #EBD0FF;
        color: #7A1CAC;
        font-size: 12px;
        font-weight: 600;
        padding: 4px 10px;
        border-radius: 6px;
        margin-bottom: 8px;
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
<div class="hero-koleksi d-flex justify-content-center align-items-center">
    <div class="hero-text text-center">
        <h1 class="fw-bold">Koleksi Khusus</h1>
        <p>Akses berbagai koleksi khusus di perpustakaan kami.</p>
    </div>
</div>
<div class="container py-5">
    <h2 class="fw-bold text-center mb-4">Koleksi Khusus</h2>
    <div class="row g-4">
        @foreach ($koleksi as $k)
        <div class="col-md-4">
            @php
            $file = $k->file_digital;
            $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
            @endphp

            <div class="card book-card h-100">
                <div class="book-preview">

                    {{-- Gambar --}}
                    @if(in_array($ext, ['jpg','jpeg','png','webp']))
                    <img src="{{ asset('uploads/koleksi/'.$file) }}" class="book-img">

                    {{-- PDF --}}
                    @elseif($ext === 'pdf')
                    <iframe src="{{ asset('uploads/koleksi/'.$file) }}#toolbar=0"
                        style="width:100%; height:100%; border:none;"></iframe>

                    {{-- Video --}}
                    @elseif(in_array($ext, ['mp4','webm']))
                    <video class="w-100 h-100" autoplay muted loop style="object-fit:cover;">
                        <source src="{{ asset('uploads/koleksi/'.$file) }}">
                    </video>

                    {{-- File lainnya --}}
                    @else
                    <i class="fa-solid fa-file fs-1 text-secondary"></i>
                    @endif

                </div>

                <!-- BODY CARD -->
                <div class="card-body">

                    <span class="label-badge">{{ $k->jenis }}</span>

                    <h5 class="fw-bold">{{ $k->judul }}</h5>

                    <p class="small text-muted mb-1">
                        <i class="fa-solid fa-user-pen me-1"></i> {{ $k->penulis }}
                    </p>

                    <p class="small text-muted">
                        <i class="fa-solid fa-calendar me-1"></i>
                        {{ $k->tahun }}
                    </p>

                    <button type="button" class="btn btn-gradient w-100 mt-3" data-bs-target="#staticBackdrop{{$k->id}}" data-bs-toggle="modal">
                        Lihat Detail
                    </button>

                </div>
            </div>

        </div>
        @endforeach
        <!-- Paginate -->
        <div class="mt-5">
            {{ $koleksi->links('pagination::bootstrap-5') }}
        </div>
    </div>
</div>
@foreach ($koleksi as $k)
    @include('partials.modal_koleksi')
@endforeach
@include('partials.footer')
@endsection
