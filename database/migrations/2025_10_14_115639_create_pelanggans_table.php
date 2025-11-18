<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id('id_pelanggan');
            // Menghubungkan ke tabel users (akun login)
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('no_hp', 15)->nullable();
            $table->text('alamat')->nullable();
            // Menyimpan data motor default user (opsional)
            $table->string('jenis_motor_default')->nullable();
            $table->string('no_polisi_default')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelanggans');
    }
};