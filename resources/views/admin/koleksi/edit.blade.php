@extends('layout.appadmin')
@section('title', 'Edit Koleksi')
@section('content')
    <div class="card p-5 border-0 shadow-lg">
        <h2 class="text-center text-primary fw-bold mb-4">
            <i class="fas fa-plus"></i> Edit Koleksi Khusus
        </h2>
        <form action="{{ route('koleksi.khusus.update', $koleksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row g-3">
                <div class="col-md-6">
                    <label for="kode_koleksi" class="form-label fw-semibold">Kode Koleksi</label>
                    <input type="text" id="kode_koleksi" class="form-control" name="kode_koleksi" required placeholder="Masukan kode koleksi" value="{{ $koleksi->kode_koleksi }}" >
                </div>
                <div class="col-md-6">
                    <label for="judul" class="form-label fw-semibold">Judul</label>
                    <input type="text" id="judul" class="form-control" name="judul" required placeholder="Masukan judul" value="{{ $koleksi->judul }}">
                </div>
                <div class="col-md-12">
                    <label for="penulis" class="form-label fw-semibold">Penulis</label>
                    <input type="text" id="penulis" class="form-control" name="penulis" required placeholder="Masukan penulis" value="{{ $koleksi->penulis }}">
                </div>
                <div class="col-md-4">
                    <label for="tahun" class="form-label fw-semibold">Tahun</label>
                    <input type="number" min="1000" max="{{ date('Y') }}" id="tahun" class="form-control" name="tahun" placeholder="Masukan tahun" required value="{{ $koleksi->tahun }}">
                </div>
                <div class="col-md-4">
                    <label for="jenis" class="form-label fw-semibold">Jenis</label>
                    <select name="jenis" id="jenis" class="form-select" required>
                        <option value="" disabled selected>Pilih Jenis</option>
                        <option value="Buku Langka" {{ $koleksi->jenis == 'Buku Langka' ? 'selected' : '' }}>Buku Langka</option>
                        <option value="Naskah" {{ $koleksi->jenis == 'Naskah' ? 'selected' : '' }}>Naskah</option>
                        <option value="Arsip" {{ $koleksi->jenis == 'Arsip' ? 'selected' : '' }}>Arsip</option>
                        <option value="Foto"{{ $koleksi->jenis == 'Foto' ? 'selected' : '' }}>Foto</option>
                        <option value="Digital" {{ $koleksi->jenis == 'Digital' ? 'selected' : '' }}>Digital</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="kondisi" class="form-label fw-semibold">Kondisi</label>
                    <select name="kondisi" id="kondisi" class="form-select" required>
                        <option value="" selected disabled>Pilih Kondisi</option>
                        <option value="Baik" {{ $koleksi->kondisi == 'Baik' ? 'selected' : '' }}>Baik</option>
                        <option value="Rusak" {{ $koleksi->kondisi == 'Rusak' ? 'selected' : '' }}>Rusak</option>
                        <option value="Diperbaiki" {{ $koleksi->kondisi == 'Diperbaiki' ? 'selected' : '' }}>Diperbaiki</option>
                    </select>
                </div>
                <div class="col-md-12">
                    <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" rows="3" class="form-control" required placeholder="Masukan deskripsi">{{ $koleksi->deskripsi }}</textarea>
                </div>
                <div class="col-md-6 mb-2">
                    <label for="lokasi" class="form-label fw-semibold">Lokasi</label>
                    <input type="text" id="lokasi" name="lokasi" class="form-control" required placeholder="Masukan tempat meletakan koleksi" value="{{$koleksi->lokasi}}">
                </div>
                <div class="col-md-6 mb-2">
                    <label for="file_digital" class="form-label fw-semibold">Upload File / Foto</label>
                    <input type="file" class="form-control" id="file_digital" name="file_digital" accept="*/*">
                    @if ($koleksi->file_digital)
                        <p class="small mb-0">
                            File saat ini:
                            <a href="{{ asset('uploads/koleksi/'. $koleksi->file_digital) }}" target="blank">{{ $koleksi->file_digital }}</a>
                        </p>
                    @else
                        <p class="text-muted mb-0"><small>Tidak ada file diupload sebelumnya.</small></p>
                    @endif
                    <small class="text-muted">Kosongkan jika tidak ingin ubah file</small>
                    @error('file_digital')
                        <small class="text-danger ">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-md-6">
                    <a href="{{ route('koleksi.khusus') }}" class="btn btn-secondary w-100"><i class="fas fa-arrow-left"></i> Batal</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-save"></i> Edit Koleksi</button>
                </div>
            </div>
        </form>
    </div>
@endsection