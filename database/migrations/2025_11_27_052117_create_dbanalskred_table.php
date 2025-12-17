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
        Schema::create('dbanalskred', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('idkred');
            $table->string('produk');
            $table->string('setaw');
            $table->string('bunga');
            $table->string('admin');
            $table->string('akses');
            $table->string('flex');
            $table->json('kel');
            $table->json('kek');
            $table->foreign('idkred')->references('id')->on('dbkredit')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbanalskred');
    }
};
