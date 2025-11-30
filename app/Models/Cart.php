<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    // Pastikan terhubung ke tabel 'carts'
    protected $table = 'carts';

    protected $fillable = [
        'user_id',
        'product_id',
        'product_type',
        'qty'
    ];
}