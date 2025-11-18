<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    // KOREKSI: Hapus baris primaryKey ini atau ubah menjadi 'id'
    // protected $primaryKey = 'id_transaksi'; 
    protected $guarded = [];

    // Relasi: Transaksi milik satu User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Relasi: Transaksi punya banyak detail barang
    public function detail()
    {
        // Tetap menggunakan 'id_transaksi' sebagai Foreign Key di tabel anak
        return $this->hasMany(DetailTransaksi::class, 'id_transaksi', 'id'); // Referensi PK 'id' di model Transaksi
    }
}