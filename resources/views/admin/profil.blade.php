@extends('layout.appadmin')

@section('title', 'Profil Admin')

@section('styles')
<style>


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
    <div class="profile-card m-auto">
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

        <!-- Aktivitas Terakhir -->
        <h5 class="mt-4 mb-3 text-primary fw-bold">
            <i class="fas fa-clock"></i> Aktivitas Terakhir
        </h5>
        <div class="accordion" id="activityAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingOne">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                        Hari Ini
                    </button>
                </h2>
                <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#activityAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Menambahkan data buku: <em>Belajar Laravel</em></li>
                            <li>Mengupdate profil karyawan</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo">
                        Kemarin
                    </button>
                </h2>
                <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#activityAccordion">
                    <div class="accordion-body">
                        <ul>
                            <li>Menambahkan data peminjaman</li>
                            <li>Menghapus data karyawan</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tombol -->
        <div class="text-center mt-4">
            <button class="btn btn-primary px-4 py-2" id="editBtn">
                <i class="fas fa-edit"></i> Edit Profil
            </button>
            <a href="{{ route('logout') }}" class="btn btn-outline-danger px-4 py-2 ms-2" id="logoutBtn">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </div>
    </div>
@endsection

@section('scripts')
<script>
     // contoh interaksi: edit profil
    document.getElementById("editBtn").addEventListener("click", function () {
        alert("Fitur Edit Profil masih dalam pengembangan 🚀");
    });

    // contoh interaksi: logout
    document.getElementById("logoutBtn").addEventListener("click", function () {
        if (confirm("Yakin ingin logout?")) {
            window.location.href = "/logout";
        }
    });

    // Tooltip Bootstrap
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(el => new bootstrap.Tooltip(el))

</script>
@endsection
