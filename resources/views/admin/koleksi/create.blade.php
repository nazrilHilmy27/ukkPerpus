@extends('layout.appadmin')
@section('title', 'Tambah Koleksi')
@section('content')
    <div class="card p-5 border-0 shadow-lg">
        <h2 class="text-center text-primary fw-bold mb-4">
            <i class="fas fa-plus"></i> Tambah Koleksi Khusus
        </h2>
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show rounded-4 shadow-sm" role="alert">
                <strong><i class="fas fa-triangle-exclamation me-2"></i>Terjadi Kesalahan:</strong>
                <ul class="mt-2 mb-0 ps-3">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('koleksi.khusus.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="kode_koleksi" class="form-label fw-semibold">Kode Koleksi</label>
                    <input type="text" id="kode_koleksi" class="form-control" name="kode_koleksi" required placeholder="Masukan kode koleksi">
                </div>
                <div class="col-md-6">
                    <label for="judul" class="form-label fw-semibold">Judul</label>
                    <input type="text" id="judul" class="form-control" name="judul" required placeholder="Masukan judul">
                </div>
                <div class="col-md-12">
                    <label for="penulis" class="form-label fw-semibold">Penulis</label>
                    <input type="text" id="penulis" class="form-control" name="penulis" required placeholder="Masukan penulis">
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label fw-semibold">Tahun</label>
                    <input type="number" min="1000" max="{{ date('Y') }}" id="tahun" class="form-control" placeholder="Masukan tahun" name="tahun" required>
                </div>
                <div class="col-md-4">
                    <label for="jenis" class="form-label fw-semibold">Jenis</label>
                    <select name="jenis" id="jenis" class="form-select" required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="Buku Langka">Buku Langka</option>
                        <option value="Naskah">Naskah</option>
                        <option value="Arsip">Arsip</option>
                        <option value="Foto">Foto</option>
                        <option value="Digital">Digital</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="kondisi" class="form-label fw-semibold">Kondisi</label>
                    <select name="kondisi" id="kondisi" class="form-select" required>
                        <option value="" selected disabled>Pilih Kondisi</option>
                        <option value="Baik">Baik</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Diperbaiki">Diperbaiki</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required placeholder="Masukan deskripsi"></textarea>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" required placeholder="Masukan tempat meletakan koleksi">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="file_digital" class="form-label fw-semibold">Upload File / Foto</label>
                    <input type="file" class="form-control" id="file_digital" name="file_digital" accept="*/*">
                    <small class="text-muted">Bisa foto, dokumen, atau file digital lain sesuai jenis koleksi</small>
                </div>
                <div class="col-md-6">
                    <a href="{{ route('koleksi.khusus') }}" class="btn btn-secondary w-100"><i class="fas fa-arrow-left"></i> Batal</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Simpan Koleksi</button>
                </div>
            </div>
        </form>
    </div>
@endsection