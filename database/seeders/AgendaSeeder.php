<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $agendas = [
            [
                'title' => 'Upacara Hari Bhayangkara ke-78',
                'date' => now()->addDays(5),
                'location' => 'Lapangan Gajah Mada',
                'description' => 'Upacara peringatan HUT Bhayangkara.',
                'satker_name' => 'Subbag Renmin',
            ],
            [
                'title' => 'Pelatihan Gada Pratama Gelombang II',
                'date' => now()->addDays(12),
                'location' => 'SPN Polda NTB',
                'description' => 'Pembukaan pelatihan satpam tingkat dasar.',
                'satker_name' => 'Subdit Binsatpam/Polsus',
            ],
            [
                'title' => 'Rapat Koordinasi Lintas Sektoral',
                'date' => now()->addDays(2),
                'location' => 'Ruang Rapat Utama',
                'description' => 'Membahas persiapan Operasi Ketupat.',
                'satker_name' => 'Bag Binopsnal',
            ],
        ];

        foreach ($agendas as $agenda) {
            \App\Models\Agenda::create([
                'title' => $agenda['title'],
                'slug' => Str::slug($agenda['title']),
                'date' => $agenda['date'],
                'location' => $agenda['location'],
                'description' => $agenda['description'],
                'satker_name' => $agenda['satker_name'],
                'gallery' => [], // Empty array for now
            ]);
        }
    }
}
