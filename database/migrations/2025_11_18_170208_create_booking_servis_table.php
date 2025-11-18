<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('booking_servis', function (Blueprint $table) {
            $table->id('id_booking');
            
            // Bisa null jika user belum login / tamu
            $table->foreignId('user_id')->nullable()->index();
            
            // Field sesuai gambar form "Daftar Layanan"
            $table->string('nama_pemilik');
            $table->string('no_polisi', 20);
            $table->string('no_hp', 20);
            $table->string('jenis_motor', 50); // Matic, Bebek, Sport, dll
            $table->string('tipe_servis', 50)->nullable(); // Servis Ringan/Berat/Ganti Oli
            $table->text('keluhan')->nullable();
            
            $table->dateTime('jadwal_servis')->nullable(); // Kapan mau servis
            $table->string('status', 20)->default('pending'); // pending, diproses, selesai
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('booking_servis');
    }
};