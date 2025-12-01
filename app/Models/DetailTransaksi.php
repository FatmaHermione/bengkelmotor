<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// Import semua model barang
use App\Models\Oli;
use App\Models\Ban;
use App\Models\Gear;
use App\Models\Sparepart;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi'; 
    
    // PERBAIKAN 1: Primary Key standar Laravel adalah 'id' (kecuali Anda ubah di migrasi)
    protected $primaryKey = 'id'; 

    // Guarded kosong agar semua bisa diisi (mass assignment)
    protected $guarded = [];

    // Relasi ke Transaksi Induk (SUDAH BENAR)
    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi', 'id');
    }

    // PERBAIKAN 2: Relasi Produk Dinamis
    // Karena tabelnya pisah, kita buat fungsi khusus untuk mengambil data barangnya
    public function getBarangAttribute()
    {
        // Cek kolom 'jenis_produk' di database
        if ($this->jenis_produk == 'oli') {
            return Oli::find($this->id_produk);
        } 
        elseif ($this->jenis_produk == 'ban') {
            return Ban::find($this->id_produk);
        } 
        elseif ($this->jenis_produk == 'gear') {
            return Gear::find($this->id_produk);
        } 
        else {
            // Default ke Sparepart
            return Sparepart::find($this->id_produk);
        }
    }
}