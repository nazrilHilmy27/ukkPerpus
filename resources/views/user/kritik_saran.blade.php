@extends('layout.appuser')
@section('title', 'Kritik & Saran')
@section('style')
    <style>
        .hero-ks{
            height: 45vh;
            background: url('https://i.pinimg.com/736x/fd/c7/57/fdc757167e8cdf1b64464dab4d926926.jpg') center/cover no-repeat;
            position: relative;
        }
        .hero-ks::after{
            content: "";
            position:absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(46, 7, 63, 0.85), rgba(46, 7, 63, 0.3));
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
        .footer-dark {
        background-color: #2a0740;
        /* ungu gelap seperti gambar */
        font-family: 'Inter', sans-serif;
    }

    .footer-link {
        color: #dcd2e8;
        text-decoration: none;
    }

    .footer-link:hover {
        color: white;
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
        <form action="" class="m-auto card shadow p-5" style="width: 600px">
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