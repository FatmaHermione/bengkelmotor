<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('detail_transaksi', function (Blueprint $table) {
        $table->id('id_detail');
        
        // Kunci asing ke tabel transaksi
        // KOREKSI: Merujuk ke kolom 'id' di tabel 'transaksi'
        $table->unsignedBigInteger('id_transaksi');
        $table->foreign('id_transaksi')->references('id')->on('transaksi')->onDelete('cascade');
        
        // Kunci asing ke tabel produk (Asumsi PK produk adalah 'id')
        $table->unsignedBigInteger('id_produk');
        $table->foreign('id_produk')->references('id')->on('produk'); 
        
        $table->integer('jumlah');
        $table->decimal('harga_satuan', 10, 2); 
        $table->decimal('subtotal', 12, 2);
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};