@extends('layout.appadmin')
@section('title', 'Edit Buku')
@section('content')
<div class="card p-5 border-0 shadow-lg">
    <h2 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-book-open"></i> Perbarui Data Buku
    </h2>
    <form action="{{ route('buku.update', $buku->id) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label for="judul" class="form-label fw-semibold">Judul Buku</label>
                <input type="text" class="form-control" id="judul" name="judul" required value="{{ $buku->judul }}">
                @error('judul')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="col-md-6 mb-3">
                <label for="penulis" class="form-label fw-semibold">Penulis</label>
                <input type="text" class="form-control" id="penulis" name="penulis" required
                    value="{{ $buku->penulis }}">
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-12 mb-3">
                <label for="penerbit" class="form-label fw-semibold">Penerbit</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit" required
                    value="{{ $buku->penerbit }}">
            </div>
            <div class="col-md-12 mb-3">
                <label for="tahun_terbit" class="form-label fw-semibold">Tahun Terbit</label>
                <input type="number" min="1000" max="2100" class="form-control" id="tahun_terbit" name="tahun_terbit" required
                    value="{{ $buku->tahun_terbit }}">
                    @error('tahun_terbit')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
            </div>
        </div>
        <div class="row g-2">
            <div class="col-md-6 mb-3">
                <label for="stok" class="form-label fw-semibold">Stok</label>
                <input type="number" min="1" class="form-control" name="stok" id="stok" required value="{{ $buku->stok }}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="kategori" class="form-label fw-semibold">Kategori</label>
                <select name="kategori" class="form-select" id="kategori">
                    <option value="Fiksi" {{ $buku->kategori == 'Fiksi' ? 'selected' : '' }}>Fiksi</option>
                    <option value="Non-Fiksi" {{ $buku->kategori == 'Non-Fiksi' ? 'selected' : '' }}>Non-Fiksi</option>
                    <option value="Pendidikan" {{ $buku->kategori == 'Pendidikan' ? 'selected' : '' }}>Pendidikan
                    </option>
                    <option value="Sains & Teknologi" {{ $buku->kategori == 'Sains & Teknologi' ? 'selected' : '' }}>
                        Sains & Teknologi</option>
                    <option value="Sejarah" {{ $buku->kategori == 'Sejarah' ? 'selected' : '' }}>Sejarah</option>
                    <option value="Agama" {{ $buku->kategori == 'Agama' ? 'selected' : '' }}>Agama</option>
                    <option value="Anak" {{ $buku->kategori == 'Anak' ? 'selected' : '' }}>Anak</option>
                    <option value="Kesehatan & Olahraga"
                        {{ $buku->kategori == 'Kesehatan & Olahraga' ? 'selected' : '' }}>Kesehatan & Olahraga</option>
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
