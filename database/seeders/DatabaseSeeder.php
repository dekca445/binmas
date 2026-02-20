<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            PageContentSeeder::class,
            SubditSeeder::class,
            OfficialSeeder::class,
            PostSeeder::class,
            AgendaSeeder::class,
            DocumentSeeder::class,
            MessageSeeder::class,
            MemberSeeder::class,
            ServiceSeeder::class,
            PartnerSeeder::class,
        ]);
    }
}
