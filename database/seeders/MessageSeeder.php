<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    // database/seeders/MessageSeeder.php

public function run(): void
{
    \App\Models\Message::create([
        'name' => 'Budi Santoso',
        'email' => 'budi@example.com',
        'phone' => '628123456789', // Ganti subject jadi phone
        'message' => 'Selamat siang, mohon info jadwal pendaftaran Satpam Gada Pratama bulan depan.',
        'status' => 'Baru',
        'is_read' => false,
    ]);
}
}
