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
        Schema::create('yurisprudensi', function (Blueprint $table) {
            $table->id();
            $table->string('tipe')->nullable();
            $table->string('judul')->nullable();
            $table->string('teu_badan')->nullable();
            $table->string('nomor_putusan')->nullable();
            $table->string('jenis')->nullable();
            $table->string('jenis_perkara')->nullable();
            $table->string('singkatan_jenis_peradilan')->nullable();
            $table->string('jenis_peradilan')->nullable();
            $table->string('singkatan_jenis')->nullable();
            $table->string('tempat_peradilan')->nullable();
            $table->string('tempat_terbit')->nullable();
            $table->date('tanggal_penetapan')->nullable();
            $table->year('tahun_terbit')->nullable();
            $table->string('sumber')->nullable();
            $table->string('subjek')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('yurisprudensi');
    }
};
