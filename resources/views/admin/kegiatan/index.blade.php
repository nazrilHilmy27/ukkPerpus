@extends('layout.appadmin')
@section('title', 'Kegiatan')
@section('content')
 <ul class="nav nav-tabs">
    <li class="nav-item">
        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#aktif">Kegiatan Aktif</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#akanDatang">Kegiatan Akan Datang</button>
    </li>
    <li class="nav-item">
        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#riwayat">Riwayat Kegiatan</button>
    </li>
 </ul>
 <div class="tab-content mt-3">
    {{-- kegiatan aktif --}}
    <div class="tab-pane fade show active" id="aktif">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-calendar"></i> Kegiatan Aktif</h5>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Ruangan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($kegiatanAktif as $ka)
                        <tr>
                            <td>{{ $loop->iteration }}</td>    
                            <td>{{ $ka->nama_kegiatan }}</td>
                            <td>{{ $ka->kategori }}</td>
                            <td>{{ $ka->lokasi }}</td>
                            <td>{{ $ka->ruangan }}</td>
                            <td>{{ $ka->tanggal_mulai }}</td>
                            <td>{{ $ka->tanggal_selesai }}</td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('kegiatan.detail', $ka->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('kegiatan.edit', $ka->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('kegiatan.delete', $ka->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    {{-- kegiatan akan datang --}}
    <div class="tab-pane fade" id="akanDatang">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-clock"></i> Kegiatan akan Datang</h5>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped hover" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Ruangan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatanAkanDatang as $kad)
                        <tr>
                            <td>{{ $loop->iteration }}</td>    
                            <td>{{ $kad->nama_kegiatan }}</td>
                            <td>{{ $kad->kategori }}</td>
                            <td>{{ $kad->lokasi }}</td>
                            <td>{{ $kad->ruangan }}</td>
                            <td>{{ $kad->tanggal_mulai }}</td>
                            <td>{{ $kad->tanggal_selesai }}</td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('kegiatan.detail', $kad->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('kegiatan.edit', $kad->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('kegiatan.delete', $kad->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    {{-- riwayat kegiatan --}}
    <div class="tab-pane fade" id="riwayat">
        <div class="card">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0"><i class="fas fa-clock-rotate-left"></i> Riwayat Kegiatan</h5>
                <a href="{{ route('kegiatan.create') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped hover" id="myTable2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Kegiatan</th>
                            <th>Kategori</th>
                            <th>Lokasi</th>
                            <th>Ruangan</th>
                            <th>Tanggal Mulai</th>
                            <th>Tanggal Selesai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($riwayatKegiatan as $rk)
                        <tr>
                            <td>{{ $loop->iteration }}</td>    
                            <td>{{ $rk->nama_kegiatan }}</td>
                            <td>{{ $rk->kategori }}</td>
                            <td>{{ $rk->lokasi }}</td>
                            <td>{{ $rk->ruangan }}</td>
                            <td>{{ $rk->tanggal_mulai }}</td>
                            <td>{{ $rk->tanggal_selesai }}</td>
                            <td>
                                <a class="btn btn-outline-success btn-sm" href="{{ route('kegiatan.detail', $rk->id) }}"><i class="fas fa-eye"></i></a>
                                <a href="{{ route('kegiatan.edit', $rk->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('kegiatan.delete', $rk->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-outline-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>    
                        @endforeach 
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
 </div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function(){
        let current = window.location.pathname.split('/').pop();
        let links = document.querySelectorAll('.sidebar .nav-link');

        links.forEach(link => {
            let href = link.getAttribute('href');
            if(href.includes(current)){
                link.classList.add("active-nav");
            } else {
                link.classList.remove("active-nav");
            }
        });
    });
</script>
@endsection