<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Models\Message;
use Illuminate\Support\Facades\Schedule;

// Hapus laporan yang sudah berumur lebih dari 3 bulan secara otomatis
Schedule::call(function () {
    Message::where('created_at', '<', now()->subMonths(3))->delete();
})->daily(); // Mengecek setiap hari pada tengah malam

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
