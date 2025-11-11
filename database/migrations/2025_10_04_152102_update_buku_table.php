<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // rename buku 
        Schema::rename('buku', 'buku_old');

        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul', length: 100);
            $table->string('penulis', length: 100);
            $table->string('penerbit', length: 100);
            $table->year('tahun_terbit');
            $table->enum('kategori', [
                'Fiksi',
                'Non-Fiksi',
                'Pendidikan',
                'Sains & Teknologi',
                'Sejarah',
                'Agama',
                'Anak',
                'Kesehatan & Olahraga'
            ]);
            $table->integer('stok');
            $table->integer('tersedia');
            $table->integer('dipinjam');
            $table->timestamps();
        });

        DB::statement('INSERT INTO buku (id, judul, penulis, penerbit, kategori, stok, created_at, updated_at)
                       SELECT id, judul, penulis, penerbit, kategori, stok, created_at, updated_at
                       FROM buku_old');

        Schema::dropIfExists('buku_old');
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
