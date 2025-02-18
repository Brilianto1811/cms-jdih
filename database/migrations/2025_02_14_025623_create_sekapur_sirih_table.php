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
        Schema::create('sekapur_sirih', function (Blueprint $table) {
            $table->id();
            $table->string('nama')->nullable();
            $table->string('jabatan')->nullable();
            $table->longText('sambutan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sekapur_sirih');
    }
};
