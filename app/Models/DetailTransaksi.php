<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    // PENTING: Mendefinisikan nama tabel secara eksplisit
    // Karena tabel di migrasi bernama 'detail_transaksi' (singular)
    protected $table = 'detail_transaksi'; 
    
    protected $primaryKey = 'id_detail';
    protected $guarded = [];

    // Relasi ke Transaksi Induk
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id_transaksi');
    }

    // Relasi ke Produk (Barang apa yang dibeli)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk', 'id_produk');
    }
}