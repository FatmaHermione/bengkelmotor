<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // 1. Perbaikan Nama Tabel (Harus ada 's' sesuai migration)
    protected $table = 'pelanggans';

    // 2. Perbaikan Primary Key (Sesuai migration id_pelanggan)
    protected $primaryKey = 'id_pelanggan';

    // 3. Gunakan guarded agar semua kolom bisa diisi (user_id, no_hp, alamat, dll)
    // Kalau mau pakai fillable, harus tulis nama kolom yang BENAR sesuai database
    protected $guarded = [];

    // Relasi ke User (Untuk mengambil nama)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}