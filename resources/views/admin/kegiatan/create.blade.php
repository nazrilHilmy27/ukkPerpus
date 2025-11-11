@extends('layout.appadmin')
@section('title', 'Tambah Kegiatan')
@section('content')
    <div class="card shadow p-5">
        <h2 class="text-primary text-center fw-bold mb-5"><i class="fas fa-plus"></i>Tambah Kegiatan</h2>
        @if ($errors->any())
            <div class="alert alert-danger d-flex align-items-start gap-2">
                <div>
                    <h6 class="mb-2 fw-bold">Terjadi Kesalahan:</h6>
                    <ul class="mb-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li class="mb-1">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama_kegiatan" class="form-label fw-semibold">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
                </div>
                <div class="col-md-6">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" class="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Umum">Umum</option>
                        <option value="Internal">Internal</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Kerjasama">Kerjasama</option>
                        <option value="Khusus">Khusus</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required>
                </div>

                <div class="col-md-12">
                    <label for="ruangan" class="form-label fw-semibold">Ruangan</label>
                    <input type="text" name="ruangan" id="ruangan" class="form-control" required>
                </div>
                
                <div class="col-md-6">
                    <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required>
                    @error('tanggal_mulai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required>
                    @error('tanggal_selesai')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="col-md-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12">
                    <label for="gambar" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">
                </div>

                
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <a href="{{ route('kegiatan.index') }}" class="btn btn-secondary text-start mt-2"><i class="fas fa-arrow-left"></i> Batal</a>
                </div>
                <div>
                    <button type="submit" class="btn btn-primary text-right mt-2"><i class="fas fa-save"></i> Simpan</button>
                </divclass=>
            </div>
        </form>
    </div>
@endsection