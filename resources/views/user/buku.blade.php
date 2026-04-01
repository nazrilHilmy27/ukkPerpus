@extends('layout.appuser')
@section('title', 'Daftar Buku')

@section('style')
<style>
    .hero-buku {
        height: 300px;
        background: url('{{ asset('img/gambar1.jpg') }}') center/cover no-repeat;
        position: relative;
    }

    .hero-buku::after {
        content: "";
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(27, 3, 37, 0.541) 20%, rgba(46, 7, 63, 0.123));
    }

    .hero-text {
        position: absolute;
        bottom: 20%;
        color: #f6e7ff;
        z-index: 5;
        text-shadow: 0 3px 10px rgba(0, 0, 0, 0.5);
    }

    .table thead {
        background: #2a0740;
        color: white;
    }

    .btn-gradient {
        background: linear-gradient(90deg, #7A1CAC, #AD49E1);
        border: none;
        color: white;
        border-radius: 8px;
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

</style>
@endsection

@section('content')

<!-- HERO SECTION -->
<div class="hero-buku d-flex justify-content-center align-items-center">
    <div class="hero-text text-center">
        <h1 class="fw-bold">Daftar Buku</h1>
        <p class="mt-2">Jelajahi koleksi buku yang tersedia di perpustakaan digital kami</p>
    </div>
</div>

<div class="container py-5">

    <!-- FILTER & SEARCH -->
    <div class="row mb-4">
        <div class="col-md-4 mb-2">
            <input type="text" id="searchInput" class="form-control p-3" placeholder="Cari Judul Buku...">
        </div>

        <div class="col-md-4 mb-2">
            <select id="categoryFilter" class="form-select p-3">
                <option value="">Semua Kategori</option>
                <option value="Fiksi">Fiksi</option>
                <option value="Non-Fiksi">Non-Fiksi</option>
                <option value="Pendidikan">Pendidikan</option>
                <option value="Sains & Teknologi">Sains & Teknologi</option>
                <option value="Sejarah">Sejarah</option>
                <option value="Agama">Agama</option>
                <option value="Anak">Anak</option>
                <option value="Kesehatan & Olahraga">Kesehatan & Olahraga</option>

            </select>
        </div>
    </div>

    <!-- TABLE -->
    <div class="table-responsive ">
        <table class="table table-bordered table-hover align-middle text-center" id="bookTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penulis</th>
                    <th>Kategori</th>
                    <th>Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($buku as $b)
                    
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $b->judul }}</td>
                    <td>{{ $b->penulis }}</td>
                    <td>{{ $b->kategori }}</td>
                    <td>{{ $b->penerbit }}</td>
                    <td>
                        <button class="btn btn-gradient btn-sm px-3" data-bs-target="#staticBackdrop{{ $b->id }}" data-bs-toggle="modal">Detail</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @foreach ($buku as $b)
        @include('partials.modal_buku')
    @endforeach
</div>

@include('partials.footer')

@endsection

@section('script')
<script>
    // SEARCH FILTER
    document.getElementById("searchInput").addEventListener("keyup", function () {
        let value = this.value.toLowerCase();
        let rows = document.querySelectorAll("#bookTable tbody tr");

        rows.forEach(row => {
            let text = row.innerText.toLowerCase();
            row.style.display = text.includes(value) ? "" : "none";
        });
    });

    // CATEGORY FILTER
    document.getElementById("categoryFilter").addEventListener("change", function () {
        let filter = this.value.toLowerCase();
        let rows = document.querySelectorAll("#bookTable tbody tr");

        rows.forEach(row => {
            let category = row.cells[3].innerText.toLowerCase();
            row.style.display = (filter === "" || category === filter) ? "" : "none";
        });
    });

    
    $(document).ready(function () {
        $('#bookTable').DataTable({
            searching: false,
            responsive: true,
            language: {
                lengthMenu: "Menampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                zeroRecords: "Data tidak ditemukan",
                emptyTable: "Belum ada data yang tersedia",
                paginate: {
                    first: "<<",
                    last: ">>",
                    next: ">",
                    previous: "<",
                },
            },
        });
    });
</script>
@endsection
