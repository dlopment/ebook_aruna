<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lks extends Model
{
    use HasFactory;
    protected $table = 'dtlowongan';
    protected $fillable = [
        'id',
        'nama_lkp',
        'nm_pngl',
        'nama_ibu',
        'jns_klm',
        'no_ktp',
        'ktp_brk',
        'tgl_lahir',
        'tmt_lahir',
        'status',
        'npwp',
        'notlpn',
        'nohp',
        'jmlh_tanggn_is',
        'jmlh_tanggn_an',
        'jmlh_tanggn_lain',
        'email',
        'nm_ush',
        'bdng_ush',
        'lma_ush',
        'almt',
        'kelurahan',
        'kota',
        'kode_pos',
        'kecamatan',
        'provinsi',
        'jns_usaha',
        'sts_ush',
        'lm_tempati',
        'ijn_ush',
        'tgl_ijin_usaha',
        'keteranga',

        'nama_pas',
        'tgl_lahir_pas',
        'tmpt_lahir',
        'alamat',
        'pekerjaan',
        'no_hp_pas',
        'no_ktp_pas',

        'tmpt_kerja',
        'almt_tmpt_krj',
        'no_tlp_knt',
        'lm_krja',
        'jabatan',
        'gaji',
        'ket',

        'nm_penjamin',
        'almt_penjamin',
        'pekerjaan_penjamin',
        'no_hp',
        'no_ktp_pen',
        'no_npwp_pen',

        'stts_pinjmn',
        'jns_pin',
        'tujuan_peng',
        'plafond',
        'jnk_wkt',
        'sk_wkt_thn',
        'mdl_angsrn',

        'nama_klrg_tdk_serumah',
        'hubungan',
        'alamat_klrg_tdk',
        'pekerjaan_tdk_serumah',
        'no_hp_tidk',

        'dt_agn',

        'almt_cadeb',
        'kel_cadeb',
        'kot_cadeb',
        'kode_cadeb',
        'kec_cadeb',
        'prov_cadeb',
        'status_tem_cadeb',
        'lama_menempati',
        'alamt_tdk_ktp',
        'kel_tdk_cadeb',
        'kot_tdk_cadeb',
        'kod_tdk_cadeb',
        'kec_tdk_cadeb',
        'prov_tdk_cadeb',
        'tipe_marketing',
        'kode',
        'nama',
        'keterangan',
        'tgl_peng'

    ];
}
