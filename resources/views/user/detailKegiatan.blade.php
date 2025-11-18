@extends('layout.appuser')
@section('title', 'Detail Kegiatan')
@section('content')

<div class="container py-3">
    <h1 class="mb-3">Detail Kegiatan</h1>
    @if ($kegiatan->gambar)
    <img src="{{ asset('uploads/kegiatan/'. $kegiatan->gambar) }}" alt="{{ $kegiatan->gambar }}" class="img-fluid w-100">
    @else
        <div class="p-5 text-center bg-light">
            <i class="fas fa-images text-muted fa-4x mb-3"></i>
            <h5 class="text-muted">Tidak Ada Poster Informasi</h5>
            <p class="text-muted">Tidak ada poster informasi tersedia untuk koleksi ini.</p>
        </div>    
    @endif

    <div class="row border mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Nama Kegiatan
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2 fw-semibold">{{ $kegiatan->nama_kegiatan }}</p>
        </div>
    </div>

    <div class="row border border-top-0 mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Kategori
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2">{{ $kegiatan->kategori }}</p>
        </div>
    </div>
    <div class="row border border-top-0 mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Lokasi
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2">{{ $kegiatan->lokasi }}</p>
        </div>
    </div>
    <div class="row border border-top-0 mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Ruangan
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2">{{ $kegiatan->ruangan }}</p>
        </div>
    </div>
    <div class="row border border-top-0 mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Waktu Pelaksanaan
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2">
                {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('D, d M Y') }} 
                - 
                {{ \Carbon\Carbon::parse($kegiatan->tanggal_mulai)->format('D, d M Y') }} 
            </p>
        </div>
    </div>
    <div class="row border border-top-0 mx-0">
        <div class="col-md-4 bg-light d-flex align-items-center border-end">
            <p class="mb-0 p-2 text-start">
                Deskripsi
            </p>
        </div>
        <div class="col-md-8 d-flex align-items-center bg-white">
            <p class="mb-0 p-2">{{ $kegiatan->deskripsi }}</p>
        </div>
    </div>


    {{-- Tombol aksi --}}
    <div class="d-flex justify-content-end gap-2 mt-4">
        <a href="{{ route('kegiatan') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
    </div>

</div>
@endsection
