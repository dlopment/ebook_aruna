<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbdeposito extends Model
{
    use HasFactory;
    protected $table = 'dbdeposito';

    protected $fillable = [
        'id',
        'nama_produk',
        'gambar',
        'desprod',
        'sk_bunga',
        'setawmin',
        'setselmin',
        'salpeng',
        'jang_wkt',
        'kel',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'desprod' => 'array',
        'kel' => 'array',
    ];
}
