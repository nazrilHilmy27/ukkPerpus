@extends('layout.appadmin')

@section('title', 'Profil Admin')

@section('styles')
<style>
    .center-page {
        min-height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .profile-card {
        background: #fff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
        width: 100%;
        max-width: 850px;
        animation: fadeIn 0.6s ease;
    }

    .profile-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 25px;
    }

    .profile-header img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        object-fit: cover;
        border: 3px solid #3b82f6;
    }

    .profile-header h3 {
        margin: 0;
        font-weight: 700;
        color: #1e3a8a;
    }

    .profile-header p {
        margin: 0;
        color: #6b7280;
    }

    .info-list li {
        padding: 10px 0;
        border-bottom: 1px solid #f1f5f9;
    }

    .info-list li strong {
        color: #111827;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
            transform: translateY(10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
    .avatar {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: linear-gradient(135deg, #3b82f6, #1e3a8a);
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 32px;
    font-weight: 700;
    text-transform: uppercase;
}

</style>
@endsection

@section('content')
<div class="center-page">
    <div class="profile-card ">
        <!-- Header Profil -->
        <div class="profile-header">
            <div class="avatar" id="avatarUser">NH</div>
            <div>
                <h3 id="namaUser">{{ $data['name'] }}</h3>
                <p id="jabatanUser">Admin Perpustakaan</p>
            </div>
        </div>


        <!-- Detail Info -->
        <h5 class="mb-3 text-primary fw-bold">
            <i class="fas fa-id-card"></i> Detail Profil
        </h5>
        <ul class="list-unstyled info-list">
            <li><strong>Email:</strong> <span id="emailUser">{{ $data['email'] }}</span></li>
            <li><strong>No. Telepon:</strong> <span id="telpUser">{{ $data['hp'] }}</span></li>
            <li><strong>Role:</strong> <span id="divisiUser">Admin</span></li>
            <li><strong>Alamat:</strong> <span id="alamatUser">{{ $data['alamat'] }}</span></li>
        </ul>

        <!-- Tombol -->
        <div class="text-center mt-4">
            
            <a href="{{ route('logout') }}" class="btn btn-outline-danger px-4 py-2 ms-2 w-25">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
</div>
@endsection

