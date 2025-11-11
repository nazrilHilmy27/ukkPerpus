<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    public function showDataPeminjam(){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $peminjaman = DB::table('peminjaman')
            ->join('pengunjung', 'peminjaman.pengunjung_id', '=', 'pengunjung.id')
            ->join('buku', 'peminjaman.buku_id', '=', 'buku.id')
            ->select('peminjaman.*', 'pengunjung.nama as nama_pengunjung', 'buku.judul as judul_buku')
            ->orderBy('peminjaman.id', 'desc')
            ->get();
            return view('admin.dataPeminjam', compact('peminjaman'));
        }
        public function create(){
            if(!Session::has('user')){
                return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
            }
            $buku = DB::table('buku')->get();
            $pengunjung = DB::table('pengunjung')->orderBy('nama')->get();
            return view('admin.createPeminjam', compact('pengunjung', 'buku'));
        }
        public function store(Request $request){
            $request->validate([
                'pengunjung_id' => 'required|exists:pengunjung,id',
                'buku_id' => 'required|exists:buku,id',
                'jumlah' => 'required|integer|min:1',
                'tanggal_pinjam' => 'required|date|before_or_equal:today',
                'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
                'status' => 'required|string',
            ]);
            $buku = DB::table('buku')->where('id', $request->buku_id)->first();
            $dipinjam = DB::table('peminjaman')
            ->where('buku_id', $request->buku_id)
            ->where('status', '!=', 'dikembalikan')
            ->sum('jumlah');

            $tersedia = $buku->stok - $dipinjam;
            if($tersedia <= 0){
                return back()->with('error', 'Buku ini sedang tidak tersedia untuk dipinjam');
            }
            if($request->jumlah > $tersedia){
                return back()->with('error', 'Jumlah peminjaman melebihi stok tersedia');
            }


            DB::table('peminjaman')->insert([
                'pengunjung_id' => $request->pengunjung_id,
                'buku_id' => $request->buku_id,
                'jumlah' => $request->jumlah,
                'tanggal_pinjam' => $request->tanggal_pinjam,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' => $request->status
            ]);
            return redirect()->route('data.peminjam')->with('success', 'Data peminjaman berhasil ditambahkan');
        }
        public function edit($id){
            $peminjaman = DB::table('peminjaman')->where('id', $id)->first();
            $buku = DB::table('buku')->get();
            $pengunjung = DB::table('pengunjung')->get();
            return view('admin.editPeminjam', compact('peminjaman', 'buku', 'pengunjung'));
        }
        public function update(Request $request, $id){
            $request->validate([
                'jumlah' => 'required|integer|min:1',
                'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
                'status' => 'required',
            ], [
                'tanggal_kembali.after_or_equal' => 'Tanggal kembali harus sama dengan atau setelah tanggal pinjam',
            ]);

        if (strtolower($request->status) != 'dikembalikan'){
            $buku = DB::table('buku')->where('id', $request->buku_id)->first();
            $dipinjam = DB::table('peminjaman')
            ->where('buku_id', $request->buku_id)
            ->where('status', '!=', 'dikembalikan')
            ->where('id', '!=', $id)
            ->sum('jumlah');
            
            $tersedia = $buku->stok - $dipinjam;
            if ($tersedia <= 0) {
                return back()->with('error', 'Buku ini sedang tidak tersedia untuk dipinjam');
            }
            if ($request->jumlah > $tersedia) {
                return back()->with('error', 'Jumlah peminjaman melebihi stok tersedia');
            }
        }

        DB::table('peminjaman')->where('id', $id)->update([
                'jumlah' => $request->jumlah,
                'tanggal_kembali' => $request->tanggal_kembali,
                'status' =>$request->status
            ]);
            return redirect()->route('data.peminjam')->with('success', 'Data peminjaman berhasil diupdate');
        }
        public function destroy($id){
            DB::table('peminjaman')->where('id', $id)->delete();
            return redirect()->route('data.peminjam')->with('success', 'Data peminjaman berhasil dihapus');
        }
}
