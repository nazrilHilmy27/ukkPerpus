@extends('layout.appuser')
@section('title', 'Kritik & Saran')
@section('style')
    <style>
        .hero-ks{
            height: 300px;
            background: url('{{ asset('img/gambar3.jpg') }}') center/cover no-repeat;
            position: relative;
        }
        .hero-ks::after{
            content: "";
            position:absolute;
            inset: 0; /* podo bae ne top left bottom right  */
            background: linear-gradient(to top, rgba(46, 7, 63, 0.493), rgba(46, 7, 63, 0.24));
        }
        .hero-text{
            position: absolute;
            bottom: 20%;
            color: #f6e7ff;
            text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
        }
        .card label{
        color: #5c157d;
        }
        .btn-gradient{
            background: linear-gradient(90deg, #7A1CAC, #AD49E1);
            color: white;
            border-radius: 8px;
            border: none;
        }
        .container form {
            max-width: 70%;
        }
        .footer-dark {
            background-color: #4a0375; 
            font-family: 'Inter', sans-serif;
        }

        .footer-link {
            color: #dcd2e8;
            text-decoration: none;
        }

        .footer-link:hover {
            color: white;
        }
        .alert {
            max-width: 70%;
        }
    </style>
@endsection
@section('content')
    <div class="hero-ks d-flex justify-content-center align-items-center">
        <div class="hero-text text-center">
            <h1 class="fw-bold">Kritik & Saran</h1>
            <p>Kami sangat menghargai masukan dari Anda.</p>
        </div>
    </div>

    <div class="container py-5 mt-4">
        @if (session('success'))
            <div class="alert alert-success mb-2 m-auto">{{ session('success') }}</div>
        @endif
        <form action="{{route('kritik.saran.store')}}" method="POST" class="m-auto card shadow p-5" >
            @csrf

            <h2 class="text-center mb-4">Kritik & Saran</h2>

            <div class="mb-2">
                <label for="name" class="form-label fw-semibold">Nama</label>
                <input type="text" name="nama" id="name" class="form-control" placeholder="Masukkan nama Anda" required>
            </div>
            <div class="mb-2">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="contoh@email.com" required>
            </div>
            <div class="mb-2">
                <label for="pesan" class="form-label fw-semibold">Pesan Anda</label>
                <textarea name="pesan" id="pesan" rows="3" class="form-control" placeholder="Tuliskan kritik atau saran Anda..."></textarea>
            </div>

            <button class="btn btn-gradient w-100 mt-3">Kirim Masukan</button>
        </form>
    </div>

@include('partials.footer')
@endsection