@extends('layout.appadmin')

@section('title', 'Edit Data Peminjaman Buku')

@section('content')
<div class="card p-5 shadow-lg border-0 m-auto " style="max-width: 1000px;">
    <h2 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-book"></i> Edit Data Peminjaman Buku
    </h2>
    
    <form action="{{ route('peminjam.update', $peminjaman->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nama" class="form-label fw-semibold">Nama Pengunjung</label>
                <select name="pengunjung_id" id="nama" class="form-select" required disabled>
                    <option value="" disabled selected>Pilih Pengunjung</option>
                    @foreach ($pengunjung as $p)
                        <option value="{{ $p->id }}" {{ $peminjaman->pengunjung_id == $p->id ? 'selected' : '' }} readonly>{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="buku" class="form-label fw-semibold">Judul Buku</label>
                <select name="buku_id" id="buku" class="form-select" required disabled> 
                    <option value="" disabled selected>Pilih Buku</option>
                    @foreach ($buku as $b)
                        <option value="{{ $b->id }}" {{ $peminjaman->buku_id == $b->id ? 'selected' : '' }} readonly>{{ $b->judul }}</option>
                        @endforeach
                    </select>
                    <input type="text" name="buku_id" hidden value="{{ $peminjaman->buku_id }}">
            </div>
            <div class="col-md-12">
                <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                <input type="number" min="1" name="jumlah" id="jumlah" value="{{ $peminjaman->jumlah }}" class="form-control" placeholder="Masukkan jumlah buku yang dipinjam" required>
                @if (session('error'))
                    <small class="text-danger">{{ session('error') }}</small>
                @endif
            </div>
            <div class="col-md-12">
                <label for="status" class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" id="status">
                    <option value="dipinjam" {{ $peminjaman->status == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                    <option value="dikembalikan" {{ $peminjaman->status == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                    value="{{ $peminjaman->tanggal_pinjam }}" readonly>
            </div>

            <!-- Tanggal Kembali -->
            <div class="col-md-6 mb-2">
                <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                    value="{{ $peminjaman->tanggal_kembali }}" required>
                @error('tanggal_kembali')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6">
                <a href="{{ route('data.peminjam') }}" class="btn btn-secondary w-100">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="fas fa-plus"></i> Edit Peminjaman
                </button>
            </div>
        </div>
    </form>
</div>
@endsection