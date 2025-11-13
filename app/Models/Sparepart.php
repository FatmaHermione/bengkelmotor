<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;

    protected $table = 'sparepart';

    // Primary key
    protected $primaryKey = 'idSparepart';

    protected $fillable = [
        'namaSparepart',
        'stok',
        'harga',
        'gambar'
    ];

    // Menonaktifkan timestamps karena di tabel tidak ada created_at dan updated_at
    public $timestamps = false;
}
