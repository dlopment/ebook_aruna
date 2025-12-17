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
        Schema::create('dbkredit', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('gambar')->nullable();
            $table->json('desprod');
            $table->string('plafon');
            $table->json('jnk_waktu');
            $table->string('bunga');
            $table->string('kelebihan');
            $table->longText('peryrtnketum');
            $table->longText('non_per');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbkredit');
    }
};
