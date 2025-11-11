@extends('layout.appadmin')
@section('title', 'Tambah Pengunjung')
@section('content')
<div class="card p-5 border-0 shadow-lg">
    <h2 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-user-plus"></i> Tambah Pengunjung
    </h2>
    <form action="{{ route('pengunjung.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required>
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label fw-semibold">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required>
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label fw-semibold">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required>
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <a class="btn btn-secondary me-2 w-100" href="{{ route('data.pengunjung') }}">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection
