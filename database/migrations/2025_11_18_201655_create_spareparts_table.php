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
    Schema::create('spareparts', function (Blueprint $table) {
        $table->bigIncrements('idSparepart');
        
        $table->unsignedBigInteger('id_kategori'); 
        
        $table->string('namaSparepart');
        $table->integer('harga');
        $table->integer('stok');

        // PERBAIKAN KRITIS: Tambahkan kolom gambar
        $table->string('gambar')->nullable(); 

        // Definisi Foreign Key (asumsi tabel kategori dibuat dengan nama 'kategori')
        $table->foreign('id_kategori')
              ->references('id_kategori')
              ->on('kategori')
              ->onDelete('cascade');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('spareparts');
    }
};