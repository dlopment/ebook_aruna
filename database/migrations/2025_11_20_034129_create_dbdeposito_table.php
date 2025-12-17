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
        Schema::create('dbdeposito', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('gambar')->nullable();
            $table->json('desprod');
            $table->string('sk_bunga');
            $table->string('setawmin');
            $table->string('setselmin');
            $table->string('salpeng');
            $table->longText('jang_wkt');
            $table->longText('kel');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbdeposito');
    }
};
