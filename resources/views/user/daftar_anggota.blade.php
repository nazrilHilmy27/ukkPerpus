@extends('layout.appuser')
@section('title', 'Daftar Pengunjung')
@section('content')
<div class="container py-4">
    @if(session('success'))
     <div class="alert alert-success w-100 mb-2">{{session('success')}}</div>
    @endif
    <div class="card p-5 border-0 shadow-lg">
    <h2 class="mb-4 text-center  fw-bold" style="color: #AD49E1;">
        <i class="fas fa-user-plus"></i> Daftar Anggota
    </h2>
    <form action="{{ route('pengunjung.store.user') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama" class="form-label fw-semibold">Nama</label>
            <input type="text" class="form-control" id="nama" name="nama" required placeholder="Masukan nama lengkap">
            @error('nama')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label fw-semibold">Alamat</label>
            <input type="text" class="form-control" id="alamat" name="alamat" required placeholder="Masukan alamat lengkap">
        </div>
        <div class="mb-3">
            <label for="no_hp" class="form-label fw-semibold">No HP</label>
            <input type="text" class="form-control" id="no_hp" name="no_hp" required placeholder="Masukan no hp aktif">
        </div>
        <div class="row g-2">
            <div class="col-md-6">
                <a class="btn btn-secondary me-2 w-100" href="{{ route('home') }}">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn w-100" style="color: white; background: linear-gradient(90deg, #7A1CAC, #AD49E1);">Simpan</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection