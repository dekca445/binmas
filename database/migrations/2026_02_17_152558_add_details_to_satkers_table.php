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
        Schema::table('satkers', function (Blueprint $table) {
            $table->string('phone')->nullable();      // Telepon Satker
            $table->text('location')->nullable();     // Alamat/Lokasi
            $table->string('structure_image')->nullable(); // Foto Bagan Struktur
            $table->json('faq')->nullable();          // Tanya Jawab (Repeater)
            $table->json('agenda')->nullable();       // Agenda Kegiatan (Repeater)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('satkers', function (Blueprint $table) {
            //
        });
    }
};
