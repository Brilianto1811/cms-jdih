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
        Schema::create('monografi_hukum', function (Blueprint $table) {
            $table->id();
            $table->string('deskripsi_fisik')->nullable();
            $table->string('no_induk_buku')->nullable();
            $table->string('bidang_hukum')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('bahasa')->nullable();
            $table->string('isbn_issn')->nullable();
            $table->string('subjek')->nullable();
            $table->string('sumber')->nullable();
            $table->string('tipe')->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->string('cetakan_edisi')->nullable();
            $table->string('nomor_panggil')->nullable();
            $table->string('teu_badan')->nullable();
            $table->string('judul')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monografi_hukum');
    }
};
