<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KoleksiController extends Controller
{
    public function showKoleksiKhusus(){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $koleksi = DB::table('koleksi_khusus')->orderBy('kode_koleksi')->get();
        return view('admin.koleksi.koleksi_khusus', compact('koleksi'));
    }

    public function create(){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        return view('admin.koleksi.create');
    }
    public function store(Request $request){
        $request->validate([
            'kode_koleksi' => 'required|string|unique:koleksi_khusus,kode_koleksi|max:10',
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'tahun' => 'required|integer|digits:4|min:1000|max:'. date('Y'),
            'jenis' => 'required',
            'deskripsi' => 'required|string',
            'kondisi' => 'required',
            'lokasi' => 'required|string',
            'file_digital' => 'nullable|file|max:2048'
        ], [
            'kode_koleksi.unique' => 'Kode koleksi sudah ada!',
            'tahun.max' => 'Tahun tidak relevan!',
            'file_digital.max' => 'Ukuran file maksimal 2MB!',
        ]);

        $filename = null;
        if($request->hasFile('file_digital')){
            $file = $request->file('file_digital');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/koleksi'), $filename);
        }
        $data = [
            'kode_koleksi' => $request->kode_koleksi,
            'judul' => ucwords(strtolower($request->judul)),
            'penulis' => ucwords(strtolower($request->penulis)), 
            'tahun' => $request->tahun,
            'jenis' => $request->jenis, 
            'deskripsi' => ucfirst(strtolower($request->deskripsi)),
            'kondisi' => $request->kondisi, 
            'lokasi' => ucwords(strtolower($request->lokasi)),
            'file_digital' => $filename,
            'created_at' => now(),
            'updated_at' => now()
        ];
        DB::table('koleksi_khusus')->insert($data);
        return redirect()->route('koleksi.khusus')->with('success', 'Koleksi khusus berhasil ditambahkan');

    }
    public function edit($id){
        if(!Session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $koleksi = DB::table('koleksi_khusus')->where('id', $id)->first();
        return view('admin.koleksi.edit', compact('koleksi'));
    }
    public function update(Request $request, $id){
        $koleksi = DB::table('koleksi_khusus')->where('id', $id)->first();
        $request->validate([
            'kode_koleksi' => [
                'required',
                'string',
                'max:10',
                Rule::unique('koleksi_khusus', 'kode_koleksi')->ignore($id),
            ],
            'judul' => 'required|string',
            'penulis' => 'required|string',
            'tahun' => 'required|integer|digits:4|min:1000|max:' . date('Y'),
            'jenis' => 'required',
            'deskripsi' => 'required|string',
            'kondisi' => 'required',
            'lokasi' => 'required|string',
            'file_digital' => 'nullable|file'
        ], [
            'kode_koleksi.unique' => 'Kode koleksi sudah ada!',
            'tahun.max' => 'Tahun tidak relevan!',
        ]);
        $filename = $koleksi->file_digital;
        if($request->hasFile('file_digital')){
            if($filename && file_exists(public_path('uploads/koleksi/'. $filename))){
                unlink(public_path('uploads/koleksi/'. $filename));
            }
            $file = $request->file('file_digital');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/koleksi'), $filename);
        } else {
            $filename = preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $koleksi->file_digital);
        }
        $data = [
            'kode_koleksi' => $request->kode_koleksi,
            'judul' => ucwords(strtolower($request->judul)),
            'penulis' => ucwords(strtolower($request->penulis)),
            'tahun' => $request->tahun,
            'jenis' => $request->jenis,
            'deskripsi' => ucfirst(strtolower($request->deskripsi)),
            'kondisi' => $request->kondisi,
            'lokasi' => ucwords(strtolower($request->lokasi)),
            'file_digital' => $filename,
            'updated_at' => now()
        ];
        DB::table('koleksi_khusus')->where('id', $id)->update($data);
        return redirect()->route('koleksi.khusus')->with('success', 'Koleksi khusus berhasil diperbarui');
    }
    public function destroy($id){
        $koleksi = DB::table('koleksi_khusus')->where('id', $id)->first();
        if($koleksi->file_digital && file_exists(public_path('uploads/koleksi/'. $koleksi->file_digital))){
            unlink(public_path('uploads/koleksi/'. $koleksi->file_digital));
        }
        DB::table('koleksi_khusus')->where('id', $id)->delete();
        return redirect()->route('koleksi.khusus')->with('success', 'Koleksi khusus berhasil dihapus');
    }
    
}
