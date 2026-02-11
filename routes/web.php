<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

// Grouping Route agar rapi
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profil')->name('profil');
    Route::get('/berita', 'berita')->name('berita');
    Route::get('/satuan-fungsi/{slug}', 'satuanFungsi')->name('satuan-fungsi');
    Route::get('/kontak', 'kontak')->name('kontak');
});
