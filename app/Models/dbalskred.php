<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dbalskred extends Model
{
    use HasFactory;
    protected $table = 'dbanalskred';
    protected $fillable = ['id', 'idkred', 'produk', 'setaw', 'bunga', 'admin', 'akses', 'flex', 'kel', 'kek'];

    protected $casts = [
        'kel' => 'array',
        'kek' => 'array',
    ];
    public function alskredit()
    {
        return $this->belongsTo(dbkredit::class, 'id');
    }
}
