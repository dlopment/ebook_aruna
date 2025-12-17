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
        Schema::create('dbtabungan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('gambar')->nullable();
            $table->longText('desprod');
            $table->json('peruntukan');
            $table->json('suku_bng');
            $table->string('setmin');
            $table->string('setblnmin');
            $table->string('salselmin');
            $table->string('setpengmin');
            $table->string('jnkwkt');
            $table->longText('perket');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dbtabungan');
    }
};
