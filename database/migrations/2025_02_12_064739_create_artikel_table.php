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
        Schema::create('artikel', function (Blueprint $table) {
            $table->id();
            $table->string('tipe')->nullable();
            $table->string('judul')->nullable();
            $table->string('teu_badan')->nullable();
            $table->string('cetakan_edisi')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('penerbit')->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('sumber')->nullable();
            $table->string('subjek')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('bidang_hukum')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
