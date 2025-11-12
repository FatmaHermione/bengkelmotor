<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi';
    protected $primaryKey = 'id_detail';
    public $timestamps = false; // karena tidak ada kolom created_at & updated_at

    protected $fillable = [
        'id_transaksi',
        'id_produk',
        'qty',
        'subtotal',
    ];
}
