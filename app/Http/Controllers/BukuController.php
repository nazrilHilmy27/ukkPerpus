<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rule;

class BukuController extends Controller
{
    public function showDataBuku()
    {
        if (!Session::has('user')) {
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
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
        return view('admin.dataBuku', compact('buku'));
    }
    public function create()
    {
        if (!Session::has('user')) {
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        return view('admin.createBuku');
    }
    public function store(Request $request)
    {
        $judul = ucwords(strtolower($request->judul));
        $request->merge(['judul' => $judul]);

        $request->validate([
            'judul' => 'required|string|max:255|unique:buku,judul',
            'penulis' => "required|string|max:255",
            'penerbit' => "required|string|max:255",
            'tahun_terbit' => 'required|integer|digits:4|min:1000|max:'. date('Y'),
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:1'
        ], [
            'judul.unique' => 'Judul buku sudah ada!',
            'tahun_terbit.max' => 'Tahun tidak relevan!',
        ]);

        DB::table('buku')->insert([
            'judul' => $judul,
            'penulis' => ucwords(strtolower($request->penulis)),
            'penerbit' => ucwords(strtolower($request->penerbit)),
            'tahun_terbit' => $request->tahun_terbit,
            'kategori' => $request->kategori,
            'stok' => $request->stok
        ]);
        return redirect()->route('data.buku')->with('success', 'Data buku berhasil ditambahkan');
    }
    public function edit($id)
    {
        if (!Session::has('user')) {
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $buku = DB::table('buku')->where('id', $id)->first();
        return view('admin.editBuku', compact('buku'));
    }
    public function update(Request $request, $id)
    {
        $judul = ucwords(strtolower($request->judul));
        $request->merge(['judul' => $judul]);
        $request->validate([
            'judul' => [
                'required',
                'string',
                'max:255',
                Rule::unique('buku', 'judul')->ignore($id),
            ],
            'penulis' => "required|string|max:255",
            'penerbit' => "required|string|max:255",
            'tahun_terbit' => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'kategori' => 'required|string',
            'stok' => 'required|integer|min:1'
        ], [
            'judul.unique' => 'Judul buku sudah ada!',
            'tahun_terbit.max' => 'Tahun tidak relevan!',
        ]);

        DB::table('buku')->where('id', $id)->update([
            'judul' => ucwords(strtolower($request->judul)),
            'penulis' => ucwords(strtolower($request->penulis)),
            'penerbit' => ucwords(strtolower($request->penerbit)),
            'tahun_terbit' => $request->tahun_terbit,
            'kategori' => $request->kategori,
            'stok' => $request->stok
        ]);
        return redirect()->route('data.buku')->with('success', 'Data buku berhasil diperbarui');
    }
    public function destroy($id)
    {
        DB::table('buku')->where('id', $id)->delete();
        return redirect()->route('data.buku')->with('success', 'Data buku berhasil dihapus');
    }
}
