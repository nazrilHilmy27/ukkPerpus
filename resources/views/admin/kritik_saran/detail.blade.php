@extends('layout.appadmin')
@section('title', 'Detail Kritik Saran')
@section('content')
<div class="container py-4">

    <a href="{{ route('admin.kritik.saran') }}" class="btn btn-secondary btn-sm mb-3">
        ← Kembali
    </a>

    <div class="card shadow-sm">
        <div class="card-body">

            <h5 class="mb-1">{{ $pesan->nama }}</h5>
            <div class="text-muted mb-3">{{ $pesan->email }}</div>

            <hr>

            <p class="mb-4">{{ $pesan->pesan }}</p>

            <form action="{{ route('kritik.saran.delete', $pesan->id) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-danger"
                    onclick="return confirm('Yakin ingin menghapus pesan ini?')">
                    Hapus Pesan
                </button>
            </form>

        </div>
    </div>

</div>

@endsection