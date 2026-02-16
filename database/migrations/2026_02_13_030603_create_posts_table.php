<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('posts', function (Blueprint $table) {
        $table->id();
        $table->string('judul');
        $table->string('slug')->unique(); // Untuk URL (misal: giat-sambang-desa)
        $table->string('kategori'); // Giat Binmas, Satpam, dll
        $table->text('ringkasan'); // Text pendek untuk di kartu depan
        $table->longText('isi'); // Isi lengkap berita
        $table->string('gambar')->nullable(); // Path foto upload
        $table->string('penulis')->default('Admin');
        $table->integer('views')->default(0); // Hitung jumlah pembaca
        $table->timestamps(); // Created_at (Tanggal posting)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
