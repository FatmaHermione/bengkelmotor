<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelanggan extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'pelanggan';

    // Primary key
    protected $primaryKey = 'idPelanggan';

    public $incrementing = true;

    protected $keyType = 'int';

    protected $fillable = [
        'namaPelanggan',
        'alamat',
        'noTelp'
    ];
}
