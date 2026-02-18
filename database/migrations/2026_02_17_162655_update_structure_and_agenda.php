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
        // 1. Tambah kolom parent_id di tabel officials (untuk hierarki)
        Schema::table('officials', function (Blueprint $table) {
            $table->foreignId('parent_id')->nullable()->constrained('officials')->nullOnDelete();
            // Kita hapus rank_number karena diganti logika Parent-Child
            $table->dropColumn('rank_number');
        });

        // 2. Buat tabel khusus Agenda
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('satker_name'); // Relasi ke Satker (via nama/slug)
            $table->date('date');
            $table->string('location')->nullable();
            $table->text('description')->nullable();
            $table->json('gallery')->nullable(); // Foto-foto dokumentasi
            $table->timestamps();
        });

        // 3. Hapus kolom agenda & structure dari tabel satkers (bersih-bersih)
        Schema::table('satkers', function (Blueprint $table) {
            $table->dropColumn(['agenda', 'structure_image']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
