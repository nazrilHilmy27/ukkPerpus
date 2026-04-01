@extends('layout.appadmin')

@section('title', 'Data Buku')

@section('styles')
<style>
    

</style>
@endsection

@section('content')
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
