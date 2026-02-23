<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Satker;
use App\Models\Agenda;
use App\Models\Message;
use App\Models\ActivityLog; // Pastikan Model ini sudah ada
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        // LOGIKA DATA DINAMIS (7 Hari Terakhir)
        $daysRange = range(6, 0);

        $postChart = collect($daysRange)->map(fn ($days) => 
            Post::whereDate('created_at', now()->subDays($days))->count()
        )->toArray();

        $messageChart = collect($daysRange)->map(fn ($days) => 
            Message::whereDate('created_at', now()->subDays($days))->count()
        )->toArray();

        $agendaChart = collect($daysRange)->map(fn ($days) => 
            Agenda::whereDate('created_at', now()->subDays($days))->count()
        )->toArray();

        // Grafik Percobaan Akses Ilegal (Security Logs)
        $securityChart = collect($daysRange)->map(fn ($days) => 
            ActivityLog::whereDate('created_at', now()->subDays($days))->count()
        )->toArray();

        // Hitung total serangan/percobaan hari ini
        $securityToday = ActivityLog::whereDate('created_at', now())->count();

        return [
            // 1. Alert Keamanan (Tampil Paling Depan & Mencolok)
            Stat::make('Security Alerts', ActivityLog::count())
                ->description($securityToday . ' percobaan akses hari ini')
                ->descriptionIcon('heroicon-m-shield-exclamation')
                ->chart($securityChart)
                ->color($securityToday > 0 ? 'danger' : 'success') // Merah jika ada serangan hari ini
                ->extraAttributes([
                    'class' => 'cursor-pointer hover:scale-105 transition-transform',
                ]),

            // 2. Total Berita
            Stat::make('Total Berita', Post::count())
                ->description('Artikel publikasi aktif')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary')
                ->chart($postChart),

            // 3. Laporan Masuk
            Stat::make('Laporan Masuk', Message::count())
                ->description('Aduan masyarakat')
                ->descriptionIcon('heroicon-m-chat-bubble-left-right')
                ->color('info')
                ->chart($messageChart),

            // 4. Agenda Kegiatan
            Stat::make('Agenda Kegiatan', Agenda::count())
                ->description('Jadwal satker mendatang')
                ->descriptionIcon('heroicon-m-calendar-days')
                ->color('warning')
                ->chart($agendaChart),
        ];
    }
}