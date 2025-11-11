<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    // halaman login
    public function index(){
        return view('admin.login');
    }
    private function getUser():array{
        return [
            [
            'email' => 'nazrilhilmy@gmail.com',
            'password' => '$2y$12$fIpv3Br.hY7F.0Q0pLqLoeOxOVqO27ahhSFkSML1MSyTlxaQRXtem',
            'name' => 'Nazril Hilmy',
            'hp' => '0812-3456-7890',
            'role' => 'Admin',
            'alamat' => 'Jl. Raya Perpus No. 123, Pekalongan'
            ]
        ];
    }
    public function login(Request $request){
        $auth = $request->only('email', 'password');
        foreach($this->getUser() as $user){
            if($auth['email'] === $user['email'] && Hash::check($auth['password'], $user['password'])){
                Session::put('user', $user);
                return redirect()->route('dashboard');
            }
        }
        return redirect()->route('index')->with('error','Email atau Password salah');
    }

    // halaman Admin
    public function showProfil(){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error','Anda harus login terlebih dahulu');
        }
        $data = Session::get('user');
        return view('admin.profil' , compact('data'));
    }
    public function showDashboard() {
        if(!Session::has('user')){
            return redirect()->route('index')->with('error','Anda harus login terlebih dahulu');
        }
        $terlambat = DB::table('peminjaman')
            ->join('pengunjung', 'peminjaman.pengunjung_id', '=', 'pengunjung.id')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->select(
                'peminjaman.tanggal_pinjam',
                'peminjaman.tanggal_kembali',
                'peminjaman.status',
                'pengunjung.nama as nama_pengunjung',
                'buku.judul as judul_buku',
                DB::raw("CAST(julianday('now') - julianday(peminjaman.tanggal_kembali) AS INT) as hari_terlambat"),
                DB::raw("(CAST(julianday('now') - julianday(peminjaman.tanggal_kembali) AS INT) * 1000) as denda")
            )
            ->where('status', '=', 'dipinjam')
            ->where('peminjaman.tanggal_kembali', '<', now()->toDateString())
            ->get(); 
        $anggota = DB::table('pengunjung')->count();
        $buku = DB::table('buku')->count();
        $dipinjam = DB::table('peminjaman')->where('status', 'dipinjam')->count();
        $user = count($this->getUser());
        return view('admin.dashboard', compact('anggota', 'buku', 'dipinjam', 'user', 'terlambat'));
    }
    public function destroy(){
        Session::forget('user');
        return redirect()->route('index')->with('success', 'Anda berhasil logout');
    }
}
