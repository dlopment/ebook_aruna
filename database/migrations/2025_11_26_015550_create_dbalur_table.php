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
        Schema::create('dbalur', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idkredit');
            $table->string('judul');
            $table->string('deskripsi');
            $table->json('daftar');
            $table->foreign('idkredit')->references('id')->on('dbkredit')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbalur');
    }
};
