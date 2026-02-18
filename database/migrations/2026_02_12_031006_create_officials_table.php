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
        Schema::create('officials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('rank')->nullable(); // Pangkat (KOMBES, AKBP, dll)
            $table->string('position'); // Jabatan (Kasubdit, Kanit, Banum)

            // 👇 KOLOM BARU: UNTUK PENGELOMPOKAN
            $table->string('unit'); // Contoh: 'Subdit Binpolmas', 'Bag Binopsnal'

            $table->string('image')->nullable();

            // 👇 PENGGANTI ORDER: 1=Pimpinan Unit, 2=Wakil/Kanit, dst
            $table->integer('rank_number')->default(99);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('officials');
    }
};
