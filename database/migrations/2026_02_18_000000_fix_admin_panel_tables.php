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
        // 1. Fix Satkers: Restore 'agenda' and ensure 'faq' exists
        Schema::table('satkers', function (Blueprint $table) {
            if (!Schema::hasColumn('satkers', 'agenda')) {
                $table->json('agenda')->nullable()->after('tugas_pokok');
            }
            if (!Schema::hasColumn('satkers', 'faq')) {
                $table->json('faq')->nullable()->after('agenda');
            }
        });

        // 2. Fix Documents: Add 'category'
        Schema::table('documents', function (Blueprint $table) {
            if (!Schema::hasColumn('documents', 'category')) {
                $table->string('category')->default('Umum')->after('title');
            }
        });

        // 3. Fix Posts: Rename columns to match Resource
        Schema::table('posts', function (Blueprint $table) {
            // Rename if old column exists and new one doesn't
            if (Schema::hasColumn('posts', 'judul') && !Schema::hasColumn('posts', 'title')) {
                $table->renameColumn('judul', 'title');
            }
            if (Schema::hasColumn('posts', 'kategori') && !Schema::hasColumn('posts', 'category')) {
                $table->renameColumn('kategori', 'category');
            }
            if (Schema::hasColumn('posts', 'isi') && !Schema::hasColumn('posts', 'content')) {
                $table->renameColumn('isi', 'content');
            }
            if (Schema::hasColumn('posts', 'gambar') && !Schema::hasColumn('posts', 'thumbnail')) {
                $table->renameColumn('gambar', 'thumbnail');
            }
            if (Schema::hasColumn('posts', 'ringkasan') && !Schema::hasColumn('posts', 'excerpt')) {
                $table->renameColumn('ringkasan', 'excerpt');
            }
            if (Schema::hasColumn('posts', 'penulis') && !Schema::hasColumn('posts', 'author')) {
                $table->renameColumn('penulis', 'author');
            }
            
            // Add 'is_published' if missing (as seen in Resource)
            if (!Schema::hasColumn('posts', 'is_published')) {
                $table->boolean('is_published')->default(true);
            }
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
