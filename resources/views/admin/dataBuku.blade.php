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
                <div class="modal fade" id="staticBackdrop{{ $b->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Detail Buku</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body p-4">
                                <h4 class="fw-bold text-primary mb-3 text-center">{{ $b->judul }}</h4>
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                                            <div class="bg-primary bg-opacity-10 rounded-3 text-primary p-2 me-2">
                                                <i class="fas fa-user-pen text-primary fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Penulis </div>
                                                <div class="fw-medium">{{ $b->penulis }}</div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                                            <div class="bg-success bg-opacity-10 p-2 text-success rounded-3 me-2">
                                                <i class="fas fa-building text-success fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Penerbit </div>
                                                <div class="fw-medium">{{ $b->penerbit }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                                            <div class="bg-info bg-opacity-10 p-2 text-info rounded-3 me-2">
                                                <i class="fas fa-book-open fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">kategori </div>
                                                <div class="fw-medium">{{ $b->kategori }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                                            <div class="bg-warning bg-opacity-10 rounded-3 text-warning p-2 me-2">
                                                <i class="fas fa-calendar-alt fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Tahun Terbit </div>
                                                <div class="fw-medium">{{ $b->tahun_terbit }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 rounded-3 shadow-sm border-0">
                                            <div class="bg-secondary bg-opacity-10 rounded-3 text-secondary p-2 me-2">
                                                <i class="fas fa-boxes-stacked fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Stok total </div>
                                                <div class="fw-medium">{{ $b->stok }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 shadow-sm rounded-3 border-0">
                                            <div class="bg-primary bg-opacity-10 p-2 text-primary rounded-3 me-2">
                                                <i class="fas fa-check-circle fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Tersedia </div>
                                                <div class="fw-medium">{{ $b->tersedia }}</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="d-flex align-items-center p-2 shadow-sm border-0 rounded-4">
                                            <div class="bg-danger bg-opacity-10 rounded-3 p-2 me-2">
                                                <i class="fas fa-book-reader text-danger fs-4"></i>
                                            </div>
                                            <div>
                                                <div class="text-muted small">Dipinjam</div>
                                                <div class="fw-semibold text-danger">{{ $b->dipinjam }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                </div>
                </div>
                
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
