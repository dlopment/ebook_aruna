<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbtabungan extends Model
{
    use HasFactory;
    protected $table = 'dbtabungan';
    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'desprod',
        'peruntukan',
        'suku_bng',
        'setmin',
        'setblnmin',
        'salselmin',
        'setpengmin',
        'jnkwkt',
        'perket',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'peruntukan' => 'array',
        'suku_bng' => 'array',
    ];
}
