<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    // PENTING: Mendefinisikan nama tabel secara eksplisit (sudah benar)
    protected $table = 'detail_transaksi'; 
    
    protected $primaryKey = 'id_detail';
    protected $guarded = [];

    // Relasi ke Transaksi Induk
    public function transaksi()
    {
        // KOREKSI 1: FK id_transaksi merujuk ke PK 'id' di model Transaksi
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    // Relasi ke Produk (Barang apa yang dibeli)
    public function produk()
    {
        // KOREKSI 2: FK id_produk merujuk ke PK 'id' di model Produk
        return $this->belongsTo(Produk::class, 'id_produk', 'id');
    }
}