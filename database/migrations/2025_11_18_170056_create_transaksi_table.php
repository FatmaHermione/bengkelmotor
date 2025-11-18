<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            
            // User yang melakukan transaksi (bisa null jika tamu)
            $table->foreignId('user_id')->nullable()->index();
            
            $table->dateTime('tanggal_transaksi');
            $table->decimal('total_harga', 12, 2);
            
            // Dari gambar: Cash, Transfer, BCA Virtual
            $table->string('metode_pembayaran', 50); 
            
            // Status: pending, lunas, batal
            $table->string('status_pembayaran', 20)->default('pending');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi');
    }
};