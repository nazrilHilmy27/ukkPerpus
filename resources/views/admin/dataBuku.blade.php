@extends('layout.appadmin')

@section('title', 'Data Buku')

@section('styles')
<style>
    

</style>
@endsection

@section('content')
        <div class="dropdown mb-3">
            <button class="btn btn-primary dropdown-toggle w-25 " id="dropdownKategori" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                Pilih Kategori
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" data-value="" href="#">Semua Kategori</a></li>
                <li><a class="dropdown-item" data-value="Fiksi" href="#">Fiksi</a></li>
                <li><a class="dropdown-item" data-value="Non-Fiksi" href="#">Non-Fiksi</a></li>
                <li><a class="dropdown-item" data-value="Pendidikan" href="#">Pendidikan</a></li>
                <li><a class="dropdown-item" data-value="Sains & Teknologi" href="#">Sains & Teknologi</a></li>
                <li><a class="dropdown-item" data-value="Sejarah" href="#">Sejarah</a></li>
                <li><a class="dropdown-item" data-value="Agama" href="#">Agama</a></li>
                <li><a class="dropdown-item" data-value="Anak" href="#">Anak</a></li>
                <li><a class="dropdown-item" data-value="Kesehatan & Olahraga" href="#">Kesehatan & Olahraga</a></li>
        </div>
    @if (session('success'))
    <div class="alert alert-success mb-2 w-100">{{ session('success') }}</div>
    @endif

    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-book-open"></i> Data Buku Perpustakaan</h5>
            <a class="btn btn-light btn-sm" href="{{ route('buku.create') }}">
                <i class="fas fa-plus"></i> Tambah Buku
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="my-table" class="table m-0 table-hover align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($buku as $b)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->penulis }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->kategori }}</td>
                            <td>
                                <button class="btn btn-outline-success btn-sm" type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $b->id }}"><i class="fas fa-eye"></i></button>
                                <a href="{{ route('buku.edit', $b->id) }}" class="btn btn-outline-warning btn-sm"><i
                                        class="fas fa-edit"></i></a>
                                <form action="{{ route('buku.delete', $b->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data ini');"
                                    style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm" type="submit"><i
                                            class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @foreach ( $buku as $b )
                @include('partials.modal_buku')
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    // Highlight nav sesuai halaman aktif
    document.addEventListener("DOMContentLoaded", function () {
        let current = window.location.pathname.split("/").pop();
        let links = document.querySelectorAll(".sidebar .nav-link");

        links.forEach(link => {
            let href = link.getAttribute("href");
            if (href.includes(current)) {
                link.classList.add("active-nav");
            } else {
                link.classList.remove("active-nav");
            }
        });
    });
    // filter dropdown
    const dropdownItems = document.querySelectorAll(".dropdown-item");
    const dropdownButton = document.getElementById("dropdownKategori");
    const rows = document.querySelectorAll("table tbody tr");

    dropdownItems.forEach(item => {
        item.addEventListener("click", function(e) {
            e.preventDefault();

            const kategoriDipilih = this.getAttribute("data-value").toLowerCase();
            const textTombol = this.textContent.trim();
            if(dropdownButton) dropdownButton.textContent = textTombol;
            if(kategoriDipilih === "") {
                dropdownButton.textContent = "Pilih Kategori";
            }
            

            rows.forEach(row => {
                const kategori = row.cells[4].textContent.toLowerCase();

                if (kategoriDipilih === "" || kategori === kategoriDipilih) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
    $(document).ready(function () {
        $('#my-table').DataTable({
            responsive: true,
            language: {
                search: "Cari:",
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
