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
        Schema::create('peraturan', function (Blueprint $table) {
            $table->id();
            $table->string('tipe_dokumen')->nullable();
            $table->string('judul')->nullable();
            $table->string('teu_badan')->nullable();
            $table->string('no_peraturan')->nullable();
            $table->year('tahun')->nullable();
            $table->string('jenis')->nullable();
            $table->string('singkatan_jenis')->nullable();
            $table->string('tempat_penetapan')->nullable();
            $table->date('tgl_penetapan')->nullable();
            $table->string('sumber')->nullable();
            $table->string('subjek')->nullable();
            $table->string('status_peraturan')->nullable();
            $table->string('keterangan_status')->nullable();
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
        Schema::dropIfExists('peraturan');
    }
};
