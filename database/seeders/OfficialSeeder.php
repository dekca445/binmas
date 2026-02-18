<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfficialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Kapolda (Contoh Pimpinan Tertinggi di Struktur, walau bukan Binmas langsung, tapi untuk hierarki)
        // Diskusikan: Apakah mau Kapolda atau Dir Binmas sebagai root?
        // Asumsi: Dir Binmas sebagai Root
        
        $dirBinmas = \App\Models\Official::create([
            'name' => 'Kombes Pol Desy Ismail, S.I.K.',
            'rank' => 'Kombes Pol',
            'position' => 'Dir Binmas',
            'image' => null,
            'unit' => 'Pimpinan',
            'parent_id' => null,
        ]);

        $wadirBinmas = \App\Models\Official::create([
            'name' => 'AKBP Zamroni, S.Ag.',
            'rank' => 'AKBP',
            'position' => 'Wadir Binmas',
            'image' => null,
            'unit' => 'Pimpinan',
            'parent_id' => $dirBinmas->id,
        ]);

        // Kabag Binopsnal
        $kabagBinops = \App\Models\Official::create([
            'name' => 'AKBP H. Lalu Mustia Amin',
            'rank' => 'AKBP',
            'position' => 'Kabag Binopsnal',
            'image' => null,
            'unit' => 'Bag Binopsnal',
            'parent_id' => $wadirBinmas->id,
        ]);

        // Kasubdit Binpolmas
         $kasubditBinpolmas = \App\Models\Official::create([
            'name' => 'AKBP H. Zamroni',
            'rank' => 'AKBP',
            'position' => 'Kasubdit Binpolmas',
            'image' => null,
            'unit' => 'Subdit Binpolmas',
            'parent_id' => $wadirBinmas->id,
        ]);

        // Kasubdit Bhabinkamtibmas
        $kasubditBhabin = \App\Models\Official::create([
            'name' => 'Kompol I Ketut Sukarja',
            'rank' => 'Kompol',
            'position' => 'Kasubdit Bhabinkamtibmas',
            'image' => null,
            'unit' => 'Subdit Bhabinkamtibmas',
            'parent_id' => $wadirBinmas->id,
        ]);
        
        // Kasubdit Satpam/Polsus
        $kasubditSatpam = \App\Models\Official::create([
            'name' => 'Kompol M. Yasin',
            'rank' => 'Kompol',
            'position' => 'Kasubdit Satpam/Polsus',
            'image' => null,
            'unit' => 'Subdit Binsatpam/Polsus',
            'parent_id' => $wadirBinmas->id,
        ]);
        
        // Kasubdit Tibsos
        $kasubditTibsos = \App\Models\Official::create([
            'name' => 'Kompol H. Amiruddin',
            'rank' => 'Kompol',
            'position' => 'Kasubdit Bintibsos',
            'image' => null,
            'unit' => 'Subdit Bintibsos',
            'parent_id' => $wadirBinmas->id,
        ]);

        // Kasubbag Renmin
        $kasubbagRenmin = \App\Models\Official::create([
            'name' => 'AKP I Wayan Sudarsana',
            'rank' => 'AKP',
            'position' => 'Kasubbag Renmin',
            'image' => null,
            'unit' => 'Subbag Renmin',
            'parent_id' => $wadirBinmas->id,
        ]);

        // Staff Children (Contoh)
        \App\Models\Official::create([
            'name' => 'Iptu I Gede Sukadana',
            'rank' => 'Iptu',
            'position' => 'Paur Subbag Renmin',
            'image' => null,
            'unit' => 'Subbag Renmin',
            'parent_id' => $kasubbagRenmin->id,
        ]);
    }
}
