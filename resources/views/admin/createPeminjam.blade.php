@extends('layout.appadmin')
@section('title', 'Tambah Data Peminjaman Buku')
@section('content')
<div class="card p-5 shadow-lg border-0 m-auto " style="max-width: 1000px;">
    <h2 class="mb-4 text-center text-primary fw-bold">
        <i class="fas fa-book"></i> Tambah Data Peminjaman Buku
    </h2>
    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    <form action="{{ route('peminjam.store') }}" method="POST">
        @csrf
        <div class="row g-3">
            <div class="col-md-6">
                <label for="nama" class="form-label fw-semibold">Nama Pengunjung</label>
                <select name="pengunjung_id" id="nama" class="form-select" required>
                    <option value="" disabled selected>Pilih Pengunjung</option>
                    @foreach ($pengunjung as $p)
                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label for="buku" class="form-label fw-semibold">Judul Buku</label>
                <select name="buku_id" id="buku_id" class="form-select" required>
                    <option value="" disabled selected>Pilih Buku</option>
                    @foreach ($buku as $b)
                        @php
                            $dipinjam = DB::table('peminjaman')
                            ->where('buku_id', $b->id)
                            ->where('status', '!=' , 'dikembalikan')
                            ->sum('jumlah');
                            $tersedia = $b->stok - $dipinjam;
                        @endphp
                        <option value="{{ $b->id }}" data-tersedia="{{ $tersedia }}">{{ $b->judul }} (Tersedia : {{ $tersedia }})</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <label for="jumlah" class="form-label fw-semibold">Jumlah</label>
                <input type="number" min="1" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah buku yang dipinjam" required>
                <small class="text-danger d-none" id="peringatan">Jumlah melebihi stok tersedia</small>
            </div>
            <div class="col-md-12">
                <label for="status" class="form-label fw-semibold">Status</label>
                <select name="status" class="form-select" id="status" required>
                    <option value="dipinjam">Dipinjam</option>
                    <option value="dikembalikan">Dikembalikan</option>
                </select>
            </div>
            <div class="col-md-6 mb-2">
                <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam</label>
                <input type="date" class="form-control" id="tanggal_pinjam" name="tanggal_pinjam"
                    value="{{ now()->format('Y-m-d') }}" readonly>
            </div>

            <!-- Tanggal Kembali -->
            <div class="col-md-6 mb-2">
                <label for="tanggal_kembali" class="form-label fw-semibold">Tanggal Kembali</label>
                <input type="date" class="form-control" id="tanggal_kembali" name="tanggal_kembali"
                    value="{{ now()->addWeek()->format('Y-m-d') }}" readonly>
            </div>
            <div class="col-md-6">
                <a href="{{ route('data.peminjam') }}" class="btn btn-secondary w-100">Batal</a>
            </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary w-100" id="btnSave">
                    <i class="fas fa-plus"></i> Tambah Peminjaman
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
@section('scripts')
    <script>
        const selectBuku = document.getElementById('buku_id');
        const jumlahInput = document.getElementById('jumlah');
        const peringatan = document.getElementById('peringatan');
        const btnSave = document.getElementById('btnSave');

        let stokTersdia = 0;
        selectBuku.addEventListener("change", function(){
            stokTersedia = parseInt(this.options[this.selectedIndex].getAttribute('data-tersedia') || 0);

            if(stokTersedia === 0){
                jumlahInput.value = "";
                jumlahInput.disabled = true;
                peringatan.classList.remove("d-none");
                peringatan.textContent = "Buku ini sedang tidak tersedia untuk dipinjam!";
                btnSave.disabled = true;
            } else {
                jumlahInput.disabled = false;
                peringatan.classList.add('d-none');
                btnSave.disabled = false;
            }
        });
        jumlahInput.addEventListener("input", function(){
            const jumlah = parseInt(this.value) || 0;
            if(jumlah > stokTersedia){
                peringatan.classList.remove('d-none');
                peringatan.textContent = 'Jumlah melebihi stok tersedia('+ stokTersedia +')';
                btnSave.disabled = true;
            } else {
                peringatan.classList.add('d-none');
                btnSave.disabled = false;
            }
        });
    </script>
@endsection