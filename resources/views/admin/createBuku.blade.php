@extends('layout.appadmin')
@section('title', 'Tambah Buku')
@section('content')
<div class="card p-5 border-0 shadow-lg">
    <h2 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-book-open"></i> Tambah Buku
    </h2>
    <form action="{{ route('buku.store') }}" method="POST">
        @csrf
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label fw-semibold">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required>
                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label fw-semibold">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-12 mb-3">
                <label for="penerbit" class="form-label fw-semibold">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" required>
            </div>
            <div class="col-md-12 mb-3">
                <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit</label>
                <input type="number" min="1000" max="2100" class="form-control" id="tahun_terbit" name="tahun_terbit" required>
                @error('tahun_terbit')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="number" min="1" class="form-control" name="stok" id="stok" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="kategori" class="form-label fw-semibold">Kategori</label>
                <select name="kategori" class="form-select" id="kategori" required>
                    <option value="" disabled selected>Pilih Kategori</option>
                    <option value="Fiksi">Fiksi</option>
                    <option value="Non-Fiksi">Non-Fiksi</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Sains & Teknologi">Sains & Teknologi</option>
                    <option value="Sejarah">Sejarah</option>
                    <option value="Agama">Agama</option>
                    <option value="Anak">Anak</option>
                    <option value="Kesehatan & Olahraga">Kesehatan & Olahraga</option>
                </select>
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <a class="btn btn-secondary me-2 w-100" href="{{ route('data.buku') }}">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
