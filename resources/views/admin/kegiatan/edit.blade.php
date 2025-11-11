@extends('layout.appadmin')
@section('title', 'Edit Kegiatan')
@section('content')
    <div class="card shadow p-5">
        <h2 class="text-primary text-center fw-bold mb-5"><i class="fas fa-plus"></i>Edit Kegiatan</h2>
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
        <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="nama_kegiatan" class="form-label fw-semibold">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required value="{{ $kegiatan->nama_kegiatan }}">
                </div>
                <div class="col-md-6">
                    <label for="kategori" class="form-label fw-semibold">Kategori</label>
                    <select name="kategori" id="kategori" class="form-control">
                        <option value="" class="" disabled selected>-- Pilih Kategori --</option>
                        <option value="Umum" {{ $kegiatan->kategori == 'Umum' ? 'selected' : '' }}>Umum</option>
                        <option value="Internal" {{ $kegiatan->kategori == 'Internal' ? 'selected' : '' }}>Internal</option>
                        <option value="Undangan" {{ $kegiatan->kategori == 'Undangan' ? 'selected' : '' }}>Undangan</option>
                        <option value="Kerjasama" {{ $kegiatan->kategori == 'Kerjasama' ? 'selected' : '' }}>Kerjasama</option>
                        <option value="Khusus" {{ $kegiatan->kategori == 'Khusus' ? 'selected' : '' }}>Khusus</option>
                    </select>
                </div>

                <div class="col-md-12">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" name="lokasi" id="lokasi" class="form-control" required value="{{ $kegiatan->lokasi }}">
                </div>

                <div class="col-md-12">
                    <label for="ruangan" class="form-label fw-semibold">Ruangan</label>
                    <input type="text" name="ruangan" id="ruangan" class="form-control" required value="{{ $kegiatan->ruangan }}">
                </div>
                
                <div class="col-md-6">
                    <label for="tanggal_mulai" class="form-label fw-semibold">Tanggal Mulai</label>
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" required value="{{ $kegiatan->tanggal_mulai }}">
                </div>
                <div class="col-md-6">
                    <label for="tanggal_selesai" class="form-label fw-semibold">Tanggal Selesai</label>
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" required value="{{ $kegiatan->tanggal_selesai }}">
                </div>

                <div class="col-md-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control">{{ $kegiatan->deskripsi }}</textarea>
                </div>

                <div class="col-md-12">
                    <label for="gambar" class="form-label fw-semibold">Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control">
                    @if ($kegiatan->gambar)
                        <p class="small">
                            File saat ini:
                            <a href="{{ asset('uploads/kegiatan/'. $kegiatan->gambar) }}" target="blank">{{ $kegiatan->gambar }}</a>
                        </p>
                    @else
                        <p class="text-muted"><small>Tidak ada gambar diupload sebelumnya.</small></p>
                    @endif
                    @error('gambar')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
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