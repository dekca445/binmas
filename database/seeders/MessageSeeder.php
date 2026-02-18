<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        \App\Models\Message::create([
            'name' => 'Budi Santoso',
            'email' => 'budi@example.com',
            'subject' => 'Pertanyaan Pendaftaran Satpam',
            'message' => 'Selamat siang, mohon info jadwal pendaftaran Satpam Gada Pratama bulan depan.',
            'is_read' => false,
        ]);
        
        \App\Models\Message::create([
            'name' => 'Siti Aminah',
            'email' => 'siti@example.com',
            'subject' => 'Pengaduan Layanan',
            'message' => 'Layanan pembuatan KTA Satpam sangat baik dan cepat. Terima kasih.',
            'is_read' => true,
        ]);
    }
}
