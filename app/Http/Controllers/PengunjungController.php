<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PengunjungController extends Controller
{
    public function showDataPengunjung(){
        if (!Session::has('user')) {
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $pengunjung = DB::table('pengunjung')->get();
        return view('admin.dataPengunjung', compact('pengunjung'));
    }
    public function create(){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        return view('admin.createPengunjung');
    }
    public function store(Request $request){
        $nama = ucwords(strtolower($request->nama));
        $request->merge(['nama' => $nama ]);
        $request->validate([
            'nama' => 'required|string|max:255|unique:pengunjung,nama',
            'alamat' => ' required|string',
            'no_hp' => 'required|string',
        ], [
            'nama.unique' => 'Nama pengunjung sudah tercatat!'
        ]);

        DB::table('pengunjung')->insert([
            'nama' => $nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('data.pengunjung')->with('success', 'Data pengunjung berhasil ditambahkan');
    }
    public function edit($id){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $pengunjung = DB::table('pengunjung')->where('id', $id)->first();
        return view('admin.editPengunjung', compact('pengunjung'));
    }
    public function update(Request $request, $id){
        $nama = ucwords(strtolower($request->nama));
        $request->merge(['nama' => $nama]);
        $request->validate([
            'nama' => [
                'required',
                'string',
                'max:255',
                Rule::unique('pengunjung', 'nama')->ignore($id)
            ],
            'alamat' => 'required|string',
            'no_hp' => 'required|string'
        ], [
            'nama.unique' => 'Nama sudah tercatat!'
        ]);

        DB::table('pengunjung')->where('id', $id)->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('data.pengunjung')->with('success', 'Data pengunjung berhasil diupdate');
    }
    public function destroy($id){
        DB::table('pengunjung')->where('id', $id)->delete();
        return redirect()->route('data.pengunjung')->with('success', 'Data pengunjung berhasil dihapus');
    }

    // dafatar user
    public function storeUser(Request $request){
        $nama = ucwords(strtolower($request->nama));
        $request->merge(['nama' => $nama ]);
        $request->validate([
            'nama' => 'required|string|max:255|unique:pengunjung,nama',
            'alamat' => ' required|string',
            'no_hp' => 'required|string',
        ], [
            'nama.unique' => 'Nama pengunjung sudah tercatat!'
        ]);

        DB::table('pengunjung')->insert([
            'nama' => $nama,
            'alamat' => ucfirst(strtolower($request->alamat)),
            'no_hp' => $request->no_hp
        ]);
        return redirect()->route('daftar.anggota')->with('success', 'Selamat anda telah bergabung menjadi anggota kami 🎉');
    }
}
