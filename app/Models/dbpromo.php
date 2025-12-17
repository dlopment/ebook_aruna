<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbpromo extends Model
{
    use HasFactory;
    protected $table = 'promo';
    protected $fillable = ['nama_promo', 'gambar', 'tgl_mulai', 'tgl_selesai', 'kategori', 'deskripsi'];
}
