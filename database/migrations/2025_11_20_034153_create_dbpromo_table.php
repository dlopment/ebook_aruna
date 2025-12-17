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
        Schema::create('dbpromo', function (Blueprint $table) {
            $table->id();
            $table->string('nama_promo');
            $table->enum('kategori', ['Tabungan', 'Deposito', 'Kredit']);
            $table->string('gambar')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->longText('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbpromo');
    }
};
