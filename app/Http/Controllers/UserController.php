<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function beranda() {
        return view('user.beranda');
    }
    public function buku(){
        $buku = DB::table('buku')
            ->leftjoin('peminjaman as p', 'p.buku_id', '=', 'buku.id')
            ->select(
                'buku.id',
                'buku.judul',
                'buku.penulis',
                'buku.penerbit',
                'buku.tahun_terbit',
                'buku.kategori',
                'buku.stok',
                DB::raw("IFNULL(SUM(CASE WHEN p.status = 'dipinjam' THEN p.jumlah ELSE 0 END), 0) as dipinjam"),
                DB::raw("(buku.stok - IFNULL(SUM(CASE WHEN p.status = 'dipinjam' THEN p.jumlah ELSE 0 END) , 0)) as tersedia")
            )->groupBy('buku.id', 'buku.judul', 'buku.penulis', 'buku.penerbit', 'buku.tahun_terbit', 'buku.kategori', 'buku.stok',)
            ->get();
        return view('user.buku', compact('buku'));
    }
    public function kegiatan(){
        $kegiatan = DB::table('kegiatan')->orderBy('tanggal_mulai', 'desc')->paginate(6);
        return view('user.kegiatan', compact('kegiatan'));
    }
    public function detail($id){
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();
        return view('user.detailKegiatan', compact('kegiatan'));
    }
    public function koleksi(){
        $koleksi = DB::table('koleksi_khusus')->paginate(6);
        return view('user.koleksi_khusus', compact('koleksi'));
    }
    public function kritik(){
        return view('user.kritik_saran');
    }
    public function daftar() {
        return view('user.daftar_anggota');
    }
}
