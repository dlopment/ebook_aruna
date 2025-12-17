<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbkredit extends Model
{
    use HasFactory;
    protected $table = 'dbkredit';
    protected $fillable = [
        'id',
        'nama_produk',
        'gambar',
        'desprod',
        'plafon',
        'jnk_waktu',
        'bunga',
        'kelebihan',
        'peryrtnketum',
        'non_per',
        'created_at',
        'updated_at'
    ];
    protected $casts = [
        'desprod' => 'array',
        'kel' => 'array',
        'jnk_waktu' => 'array',
        'peryrtnketum' => 'array',
        'non_per' => 'array',
    ];
    public function alurkredit()
    {
        return $this->hasMany(dbalur::class, 'idkredit', 'id');
    }
    public function alskredit()
    {
        return $this->hasMany(dbalskred::class, 'idkred', 'id');
    }
}
