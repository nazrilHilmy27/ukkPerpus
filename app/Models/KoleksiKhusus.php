<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KoleksiKhusus extends Model
{
    protected $table = 'koleksi_khusus';
    protected $fillable = ['kode_koleksi', 'judul', 'penulis', 'tahun', 'jenis', 'deskripsi', 'kondisi', 'lokasi', 'file_digital'];
}
