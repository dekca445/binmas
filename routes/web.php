<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\BeritaController;

// Route Index Berita (Daftar Semua Berita)
Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');

// Route Detail Berita (Baca Selengkapnya) -> WAJIB DI BAWAH INDEX
Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');

// Route untuk halaman satuan fungsi (dinamis berdasarkan ID)
Route::get('/satuan-fungsi/{id}', [SatkerController::class, 'show'])->name('satker.show');

// Route untuk halaman sambutan (statis)
Route::get('/sambutan', [PublicController::class, 'sambutan'])->name('sambutan');

// Grouping Route agar rapi
Route::controller(PublicController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/profil', 'profil')->name('profil');
    // Route::get('/berita', 'berita')->name('berita');
    Route::get('/kontak', 'kontak')->name('kontak');
});
Route::get('/satker/{slug}', [SatkerController::class, 'show'])->name('satker.show');