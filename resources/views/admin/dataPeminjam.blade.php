@extends('layout.appadmin')

@section('title', 'Data Peminjam')

@section('styles')
<style>
    /* Table Styling */
    .custom-table {
        border-collapse: separate;
        border-spacing: 0 10px;
    }

    .custom-table thead tr {
        background: linear-gradient(90deg, #1e3a8a, #3b82f6) !important;
    }

    .custom-table thead th {
        color: #fff !important;
        padding: 14px;
        font-weight: 600;
        font-size: 15px;
        background: transparent !important;
        /* biar gradient dari tr kelihatan */
    }

    .custom-table tbody tr {
        background: #fff;
        transition: all 0.25s ease;
    }

    .custom-table td {
        vertical-align: middle;
        padding: 7px;
        font-size: 14px;
        border: none;
    }

    /* Buttons */


    td .btn-success {
        background-color: #22c55e;
        border: none;
    }

    td .btn-success:hover {
        background-color: #16a34a;
        transform: scale(1.05);
    }

    .btn-danger {
        background-color: #ef4444;
        border: none;
    }

    .btn-danger:hover {
        background-color: #dc2626;
        transform: scale(1.05);
    }

</style>
@endsection

@section('content')
<div class="d-flex justify-content-between align-items-center mb-2">
    <h2 class="page-title">Peminjaman Buku</h2>
    <a href="{{ route('peminjam.create') }}" class="btn btn-primary btn-tambah"><i class="fas fa-plus"></i> Tambah</a>
</div>
<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <button type="button" class="btn btn-outline-primary status-item" id="statusDefault" data-value="">Semua</button>
        <button type="button" class="btn btn-outline-warning status-item" data-value="Dipinjam">Dipinjam</button>
        <button type="button" class="btn btn-outline-success status-item" data-value="Dikembalikan">Dikembalikan</button>
    </div>
</div>
@if (session('success'))
<div class="alert alert-success w-100">{{ session('success') }}</div>
@endif
<div class="card shadow-lg border-0">
    <div class="card-body">
        <div class="table-responsive">
            <table id="myTable" class="table custom-table table-hover w-100 table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Pengunjung</th>
                    <th>Judul Buku</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($peminjaman as $p)

                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->nama_pengunjung }}</td>
                    <td>{{ $p->judul_buku }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->tanggal_pinjam }}</td>
                    <td>{{ $p->tanggal_kembali }}</td>
                    @if ($p->status == 'dipinjam')
                    <td><span class="badge bg-warning">{{ $p->status }}</span></td>
                    @elseif ($p->status == 'dikembalikan')
                    <td><span class="badge bg-success">{{ $p->status }}</span></td>
                    @endif

                    <td>
                        <a href="{{ route('peminjam.edit', $p->id) }}" class="btn btn-outline-success btn-sm btn-action"><i
                                class="fas fa-edit"></i></a>
                        <form action="{{ route('peminjam.delete', $p->id) }}" method="POST" class="d-inline"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-outline-danger btn-sm btn-action"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
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

    const buttonItems = document.querySelectorAll(".status-item");
    const rows = document.querySelectorAll("table tbody tr");

    buttonItems.forEach(item => {
        item.addEventListener("click", function () {

            const statusDipilih = this.getAttribute("data-value").toLowerCase();
            buttonItems.forEach(btn => {
                const val = btn.getAttribute("data-value").toLowerCase();
                btn.classList.remove("btn-primary", "btn-warning", "btn-success");
                if(val === "dikembalikan"){
                    btn.classList.add("btn-outline-success");
                } else if (val === "dipinjam"){
                    btn.classList.add("btn-outline-warning");
                } else {
                    btn.classList.add("btn-outline-primary");
                }
            })
            this.classList.remove("btn-outline-primary", "btn-outline-warning", "btn-outline-success");
            if (statusDipilih === "dipinjam") {
                this.classList.add("btn-warning");
            } else if (statusDipilih === "dikembalikan") {
                this.classList.add("btn-success");
            } else {
                this.classList.add("btn-primary");
            }

            rows.forEach(row => {
                const status = row.cells[6].textContent.toLowerCase();

                if (statusDipilih === "" || status === statusDipilih) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
    window.addEventListener("DOMContentLoaded", function() {
        const defaultButton = document.getElementById("statusDefault");
        if(defaultButton) defaultButton.click();
    });

    $(document).ready(function(){
        $('#myTable').DataTable({
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
            }
        });
    })
</script>
@endsection
