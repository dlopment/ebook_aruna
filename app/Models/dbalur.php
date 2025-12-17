<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbalur extends Model
{
    use HasFactory;
    protected $table = 'dbalur';
    protected $fillable = ['id', 'idkredit', 'judul', 'deskripsi', 'daftar'];

    protected $casts = [
        'daftar' => 'array',
    ];
    public function alurkredit()
    {
        return $this->belongsTo(dbkredit::class, 'id');
    }
}
