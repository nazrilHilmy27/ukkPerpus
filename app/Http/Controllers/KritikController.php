<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class KritikController extends Controller
{
    public function index(){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $kritik = DB::table('feedback')->orderBy('id', 'desc')->get();
        return view('admin.kritik_saran.index', compact('kritik'));
    }
    public function store(Request $request){
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'pesan' => 'required|string',
        ]);
        DB::table('feedback')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'pesan' => $request->pesan,
            'read_at' => null,
        ]);
        return redirect()->route('kritik.saran')->with('success', 'Terima kasih atas kritik dan saran Anda!');
    }
    public function detail($id){
        if(!session::has('user')){
            return redirect()->route('admin.kritik.saran')->with('error', 'Anda harus login terlebih dahulu');
        }
        $kritik = DB::table('feedback')->where('id', $id)->first();
        if($kritik->read_at == null){
            DB::table('feedback')->where('id', $id)->update(['read_at' => now()]);
        }
        $pesan = DB::table('feedback')->where('id', $id)->first();
        return view('admin.kritik_saran.detail', compact('pesan'));
    }
    public function destroy($id){
        DB::table('feedback')->where('id', $id)->delete();
        return redirect()->route('admin.kritik.saran')->with('success', 'Pesan berhasil dihapus');
    }
}
