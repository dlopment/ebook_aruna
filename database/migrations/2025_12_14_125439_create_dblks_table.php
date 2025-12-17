<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('dblks', function (Blueprint $table) {
            $table->string('nama_lkp');
            $table->string('nm_pngl');
            $table->string('nama_ibu;');
            $table->enum('jns_klm', ['pria', 'wanita']);
            $table->string('no_ktp');
            $table->string('ktp_brk');
            $table->date('tgl_lahir');
            $table->string('tmt_lahir');
            $table->string('penddkn');
            $table->enum('status', ['sudah', 'belum']);
            $table->string('npwp');
            $table->string('notlpn');
            $table->string('nohp');
            $table->integer('jmlh_tanggn_is');
            $table->integer('jmlh_tanggn_an');
            $table->integer('jmlh_tanggn_lain');
            $table->string('email');
            $table->string('nm_ush');
            $table->string('bdng_ush');
            $table->string('lma_ush');
            $table->longText('almt');
            $table->string('kelurahan');
            $table->string('kota');
            $table->integer('kode_pos');
            $table->string('kecamatan');
            $table->string('provinsi');
            $table->string('jns_usaha');
            $table->string('sts_ush');
            $table->string('lm_tempati');
            $table->string('ijn_ush');
            $table->date('tgl_ijin_usaha');
            $table->longText('keteranga');

            $table->string('nama_pas');
            $table->date('tgl_lahir_pas');
            $table->string('tmpt_lahir');
            $table->string('alamat');
            $table->string('pekerjaan');
            $table->string('no_hp_pas');
            $table->string('no_ktp_pas');

            $table->string('tmpt_kerja');
            $table->longText('almt_tmpt_krj');
            $table->string('no_tlp_knt');
            $table->string('lm_krja');
            $table->string('jabatan');
            $table->string('gaji');
            $table->longText('ket');

            $table->string('nm_penjamin');
            $table->longText('almt_penjamin');
            $table->string('pekerjaan_penjamin');
            $table->string('no_hp');
            $table->string('no_ktp_pen');
            $table->string('no_npwp_pen');

            $table->string('stts_pinjmn');
            $table->string('jns_pin');
            $table->string('tujuan_peng');
            $table->string('plafond');
            $table->string('jnk_wkt');
            $table->string('sk_wkt_thn');
            $table->string('mdl_angsrn');

            $table->string('nama_klrg_tdk_serumah');
            $table->string('hubungan');
            $table->string('alamat_klrg_tdk');
            $table->string('pekerjaan_tdk_serumah');
            $table->string('no_hp_tidk');

            $table->json('dt_agn');

            $table->string('almt_cadeb');
            $table->string('kel_cadeb');
            $table->string('kot_cadeb');
            $table->string('kode_cadeb');
            $table->string('kec_cadeb');
            $table->string('prov_cadeb');
            $table->string('status_tem_cadeb');
            $table->string('lama_menempati');
            $table->string('alamt_tdk_ktp');
            $table->string('kel_tdk_cadeb');
            $table->string('kot_tdk_cadeb');
            $table->string('kod_tdk_cadeb');
            $table->string('kec_tdk_cadeb');
            $table->string('prov_tdk_cadeb');

            $table->enum('tipe_marketing', ['DSA', 'MO']);
            $table->string('kode');
            $table->string('nama');
            $table->longText('keterangan');
            $table->date('tgl_peng');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dblks');
    }
};
