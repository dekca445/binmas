<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    public function run(): void
    {
        // Assuming "Member" represents categories of personnel
        $members = [
            ['name' => 'Personil Polri', 'count' => 125, 'icon' => 'local_police', 'bg_color' => 'bg-blue-600'],
            ['name' => 'PNS Polri', 'count' => 45, 'icon' => 'badge', 'bg_color' => 'bg-yellow-500'],
            ['name' => 'Satpam Binaan', 'count' => 1250, 'icon' => 'security', 'bg_color' => 'bg-green-600'],
            ['name' => 'Anggota Polsus', 'count' => 320, 'icon' => 'admin_panel_settings', 'bg_color' => 'bg-red-600'],
        ];

        foreach ($members as $member) {
            \App\Models\Member::create($member);
        }
    }
}
