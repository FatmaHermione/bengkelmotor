<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $primaryKey = 'idSparepart';
    protected $fillable = ['namaSparepart', 'stok', 'harga', 'gambar'];
}
