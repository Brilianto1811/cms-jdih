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
        Schema::table('peraturan', function (Blueprint $table) {
            $table->string('tgl_perundangan')->nullable()->after('tgl_penetapan');
            $table->string('status')->nullable()->after('status_peraturan');
            $table->string('file_abstraksi')->nullable()->after('file');
            $table->string('status_terbit')->nullable()->after('subjek');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('peraturan', function (Blueprint $table) {
            //
        });
    }
};
