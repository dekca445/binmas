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
        Schema::create('page_contents', function (Blueprint $table) {
            $table->id();
            $table->string('page')->index(); // e.g: home, profil, kontak
            $table->string('section')->index(); // e.g: hero, sambutan, sejarah
            $table->string('key')->nullable(); // e.g: title, subtitle, image_url
            $table->text('content')->nullable(); // Text content (Rich Editor)
            $table->string('image')->nullable(); // Image path
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_contents');
    }
};
