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
        Schema::create('buku', function (Blueprint $table) {
            $table->id();
            $table->string('judul', length:100);
            $table->string('penulis', length:100);
            $table->string('penerbit', length:100);
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
            $table->enum('status', ['tersedia', 'dipinjam'])->default('tersedia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
