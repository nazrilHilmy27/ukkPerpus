<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KritikController;

Route::get('/admin', [AuthController::class, 'index'])->name('index');
Route::post('/admin/login', [AuthController::class, 'login'])->name('proses.login');
Route::get('/admin/logout', [AuthController::class, 'destroy'])->name('logout');

// halaman admin
Route::get('/admin/dashboard' , [AuthController::class, 'showDashboard'])->name('dashboard');
Route::get('/admin/profil', [AuthController::class, 'showProfil'])->name('profil');
// Peminjaman
Route::get('/admin/dataPeminjam', [PeminjamanController::class, 'showDataPeminjam'])->name('data.peminjam');
Route::get('/admin/dataPeminjam/create', [PeminjamanController::class, 'create'])->name('peminjam.create');
Route::post('/admin/dataPeminjam/store', [PeminjamanController::class, 'store'])->name('peminjam.store');
Route::get('/admin/dataPeminjam/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjam.edit');
Route::put('/admin/dataPeminjam/update/{id}', [PeminjamanController::class, 'update'])->name('peminjam.update');
Route::delete('/admin/dataPeminjam/delete/{id}', [PeminjamanController::class, 'destroy'])->name('peminjam.delete');

// Pengunjung
Route::get('admin/dataPengunjung', [PengunjungController::class, 'showDataPengunjung'])->name('data.pengunjung');
Route::get('admin/dataPengunjung/create', [PengunjungController::class, 'create'])->name('pengunjung.create');
Route::post('admin/dataPengunjung/store', [PengunjungController::class, 'store'])->name('pengunjung.store');
Route::post('admin/dataPengunjung/store/user', [PengunjungController::class, 'storeUser'])->name('pengunjung.store.user');
Route::get('admin/dataPengunjung/edit/{id}', [PengunjungController::class, 'edit'])->name('pengunjung.edit');
Route::put('admin/dataPengunjung/update/{id}', [PengunjungController::class, 'update'])->name('pengunjung.update');
Route::delete('admin/dataPengunjung/delete/{id}', [PengunjungController::class, 'destroy'])->name('pengunjung.delete');

// Kelola Buku
Route::get('/admin/dataBuku', [BukuController::class, 'showDataBuku'])->name('data.buku');
Route::get('/admin/dataBuku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/admin/dataBuku/store', [BukuController::class, 'store'])->name('buku.store');
Route::get('/admin/dataBuku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/admin/dataBuku/update/{id}', [BukuController::class, 'update'])->name('buku.update');
Route::delete('/admin/dataBuku/delete/{id}', [BukuController::class, 'destroy'])->name('buku.delete');

// kolesi
Route::get('/admin/koleksi/koleksi_khusus', [KoleksiController::class, 'showKoleksiKhusus'])->name('koleksi.khusus');
Route::get('/admin/koleksi/koleksi_khusus/create', [KoleksiController::class, 'create'])->name('koleksi.khusus.create');
Route::post('/admin/koleksi/koleksi_khusus/store', [KoleksiController::class, 'store'])->name('koleksi.khusus.store');
Route::get('/admin/koleksi/koleksi_khusus/edit/{id}', [KoleksiController::class, 'edit'])->name('koleksi.khusus.edit');
Route::put('/admin/koleksi/koleksi_khusus/update/{id}', [KoleksiController::class, 'update'])->name('koleksi.khusus.update');
Route::delete('/admin/koleksi/koleksi_khusus/delete/{id}', [KoleksiController::class, 'destroy'])->name('koleksi.khusus.delete');

// Kegiatan
Route::get('/admin/kegiatan', [KegiatanController::class, 'showKegiatan'])->name('kegiatan.index');
Route::get('/admin/kegiatan/lihatDetail/{id}', [KegiatanController::class, 'detail'])->name('kegiatan.detail');
Route::get('/admin/kegiatan/create', [KegiatanController::class, 'create'])->name('kegiatan.create');
Route::post('/admin/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store');
Route::get('/admin/kegiatan/edit/{id}', [KegiatanController::class, 'edit'])->name('kegiatan.edit');
Route::put('/admin/kegiatan/update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
Route::delete('/admin/kegiatan/delete/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.delete');

// User
Route::get('/', [UserController::class, 'beranda'])->name('home');
Route::get('/daftarBuku', [UserController::class, 'buku'])->name('daftar.buku');
Route::get('/kegiatan', [UserController::class, 'kegiatan'])->name('kegiatan');
Route::get('/detailKegiatan/{id}', [UserController::class, 'detail'])->name('detail.kegiatan.user');
Route::get('/koleksiKhusus', [UserController::class, 'koleksi'])->name('koleksi.khusus.user');
Route::get('/kritik_saran', [UserController::class, 'kritik'])->name('kritik.saran');
Route::get('/daftar_anggota', [UserController::class, 'daftar'])->name('daftar.anggota');


Route::get('/admin/kritik_saran/', [KritikController::class, 'index'])->name('admin.kritik.saran');
Route::post('/admin/kritik_saran/store', [KritikController::class, 'store'])->name('kritik.saran.store');
Route::get('/admin/kritik_saran/detail/{id}', [KritikController::class, 'detail'])->name('kritik.saran.detail');
Route::delete('/admin/kritik_saran/delete/{id}', [KritikCOntroller::class, 'destroy'])->name('kritik.saran.delete');