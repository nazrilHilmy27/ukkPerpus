@extends('layout.appadmin')

@section('title', 'Data Pengunjung')

@section('styles')
<style>

</style>
@endsection

@section('content')
    @if (Session('success'))
        <div class="alert alert-success w-100">{{ session('success') }}</div>
    @endif
    <div class="card shadow-lg border-0 rounded-3">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-users"></i>  Data Pengunjung Perpustakaan</h5>
            <a class="btn btn-light btn-sm" href="{{ route('pengunjung.create') }}">
                <i class="fas fa-plus"></i> Tambah Pengunjung
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-hover table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Nama Pengunjung</th>
                            <th>Alamat</th>
                            <th>No HP</th> 
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengunjung as $pengunjung)
                            
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pengunjung->nama }}</td>
                            <td>{{ $pengunjung->alamat }}</td>
                            <td>{{ $pengunjung->no_hp }}</td> <!-- diganti -->
                            <td class="w-25">
                                <a href="{{ route('pengunjung.edit', $pengunjung->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Update</a>
                                <form action="{{ route('pengunjung.delete', $pengunjung->id) }}" onsubmit="return confirm('Yakin mau hapus')" method="POST" style="display: inline">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
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

    $(document).ready(function(){
        $('#myTable').DataTable({
            responsive: true,
            language: {
                searchPlaceholder: "Cari pengunjung...",
                search: "",
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
    });
</script>
@endsection

