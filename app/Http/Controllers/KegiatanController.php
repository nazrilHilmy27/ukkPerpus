<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class KegiatanController extends Controller
{
    public function showKegiatan(){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $today = Carbon::today();
        $kegiatanAktif = DB::table('kegiatan')
            ->whereDate('tanggal_mulai', '<=', $today)
            ->whereDate('tanggal_selesai', '>=', $today)
            ->get();
        $kegiatanAkanDatang = DB::table('kegiatan')
            ->whereDate('tanggal_mulai', '>', $today)
            ->get();
        $riwayatKegiatan = DB::table('kegiatan')
            ->whereDate('tanggal_selesai', '<', $today)
            ->get();
        return view('admin.kegiatan.index', compact('kegiatanAktif', 'kegiatanAkanDatang', 'riwayatKegiatan'));
    }
    public function detail($id){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();
        return view('admin.kegiatan.lihatDetail', compact('kegiatan'));
    }
    public function create(){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        return view('admin.kegiatan.create');
    }
    public function store(Request $request){
        $request->validate([
            'nama_kegiatan' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'required|string',
            'ruangan' => 'required|string',
            'tanggal_mulai' => 'required|date|after_or_equal:today',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
        ],[
            'tanggal_mulai.after_or_equal' => 'Tanggal mulai harus sama dengan atau setelah tanggal hari ini.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'gambar.mimes' => 'Format gambar harus berupa PNG, JPG, atau JPEG.',
        ]);
        $filename = null;
        if($request->hasFile('gambar')){
            $file = $request->file('gambar');
            $filename = time(). '_' . preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/kegiatan'), $filename);
        }
        $data = [
            'nama_kegiatan' => ucwords(strtolower($request->nama_kegiatan)),
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'ruangan' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ];
        DB::table('kegiatan')->insert($data);
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan');
    }
    public function edit($id){
        if(!session::has('user')){
            return redirect()->route('index')->with('error', 'Anda harus login terlebih dahulu');
        }
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'nama_kegiatan' => 'required|string',
            'kategori' => 'required|string',
            'lokasi' => 'required|string',
            'ruangan' => 'required|string',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|file|mimes:png,jpg,jpeg|max:2048'
        ],[
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai',
            'gambar.mimes' => 'Format gambar harus berupa PNG, JPG, atau JPEG',
            'gambar.max' => 'Size gambar maksimal 2MB'
        ]);
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();
        $filename = $kegiatan->gambar;
        if($request->hasFile('gambar')){
            if($filename && file_exists(public_path('uploads/kegiatan/'. $filename))){
                unlink(public_path('uploads/kegiatan/'. $filename));
            }
            $file = $request->file('gambar');
            $filename = time() . '_' . preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $file->getClientOriginalName());
            $file->move(public_path('uploads/kegiatan'), $filename);

        } else {
            $filename = preg_replace('/[^A-Za-z0-9\-\_\.]/', '_', $filename);
        }
        $data = [
            'nama_kegiatan' => ucwords(strtolower($request->nama_kegiatan)),
            'kategori' => $request->kategori,
            'lokasi' => $request->lokasi,
            'ruangan' => $request->ruangan,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'deskripsi' => $request->deskripsi,
            'gambar' => $filename
        ];
        DB::table('kegiatan')->where('id', $id)->update($data);
        return redirect()->route('kegiatan.index')->with('success', 'Update kegiatan berhasil');
    }
    public function destroy($id){
        $kegiatan = DB::table('kegiatan')->where('id', $id)->first();
        if($kegiatan->gambar && file_exists(public_path('uploads/kegiatan/'. $kegiatan->gambar))){
            unlink(public_path('uploads/kegiatan/'. $kegiatan->gambar));
        }
        DB::table('kegiatan')->where('id', $id)->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus');
    }
}
