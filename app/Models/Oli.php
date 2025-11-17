<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Oli extends Model
{
    protected $table = 'olis';

    protected $fillable = [
        'nama',
        'harga',
        'gambar'
    ];
}
