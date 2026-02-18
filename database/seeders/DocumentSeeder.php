<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    public function run(): void
    {
        $docs = [
            ['title' => 'Renstra Ditbinmas 2025-2029', 'category' => 'Renstra'],
            ['title' => 'Perkap Nomor 1 Tahun 2023', 'category' => 'Regulasi'],
            ['title' => 'LAKIP Tahun 2024', 'category' => 'LAKIP'],
            ['title' => 'DIPA Ditbinmas TA 2025', 'category' => 'DIPA'],
        ];

        foreach ($docs as $doc) {
            \App\Models\Document::create([
                'title' => $doc['title'],
                'category' => $doc['category'],
                'file_path' => 'documents/dummy.pdf', // Dummy path
                'description' => 'Dokumen resmi ' . $doc['title'],
            ]);
        }
    }
}
