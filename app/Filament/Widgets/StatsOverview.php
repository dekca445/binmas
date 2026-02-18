<?php

namespace App\Filament\Widgets;

use App\Models\Post;
use App\Models\Satker;
use App\Models\Agenda;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Berita', Post::count())
                ->description('Artikel publikasi')
                ->descriptionIcon('heroicon-m-newspaper')
                ->color('primary')
                ->chart([7, 2, 10, 3, 15, 4, 17]),
            
            Stat::make('Satuan Kerja', Satker::count())
                ->description('Subdit & Satwil')
                ->descriptionIcon('heroicon-m-building-office-2')
                ->color('warning'),

            Stat::make('Agenda Kegiatan', Agenda::count())
                ->description('Jadwal mendatang')
                ->descriptionIcon('heroicon-m-calendar')
                ->color('success'),
        ];
    }
}
