<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('koleksi_khusus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_koleksi', 10)->unique();
            $table->string('judul');    
            $table->string('penulis');
            $table->integer('tahun');
            $table->enum('jenis', ['Buku Langka', 'Naskah', 'Arsip', 'Foto', 'Digital']);
            $table->text('deskripsi');
            $table->enum('kondisi', ['Baik', 'Rusak', 'Diperbaiki'])->default('Baik');
            $table->string('lokasi');
            $table->string('file_digital')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('koleksi_khusus');
    }
};
