<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'kategori';
    
    protected $primaryKey = 'id_kategori';

    public $timestamps = true;

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_kategori',
        'keterangan',
        'deskripsi',
    ];
}
