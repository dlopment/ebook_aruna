<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\lowongan;

class dtlowongan extends Model
{
    use HasFactory;
    protected $table = 'dtlowongan';
    protected $fillable = ['id', 'nama', 'alamat', 'no_tlp', 'email', 'tgl_lahir', 'jns_klmn', 'pnddkan', 'id_loker', 'cv', 'surat', 'nama_perusahaan', 'alasan', 'created_at', 'update_at'];
    public function lowongan()
    {
        return $this->belongsTo(lowongan::class, 'id_loker');
    }
}
