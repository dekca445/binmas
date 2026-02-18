<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;

class PartnerSeeder extends Seeder
{
    public function run(): void
    {
        $partners = [
            [
                'name' => 'Mabes Polri',
                'logo' => 'partners/logo-polri.png',
                'link' => 'https://polri.go.id',
            ],
            [
                'name' => 'Polda NTB',
                'logo' => 'partners/logo-polda.png',
                'link' => 'https://ntb.polri.go.id',
            ],
            [
                'name' => 'Polri Presisi',
                'logo' => 'partners/logo-presisi.png',
                'link' => 'https://presisi.polri.go.id',
            ],
             [
                'name' => 'Kemenkes',
                'logo' => 'partners/kemenkes.png',
                'link' => '#',
            ],
             [
                'name' => 'BNN',
                'logo' => 'partners/bnn.png',
                'link' => '#',
            ],
        ];

        foreach ($partners as $partner) {
            Partner::create($partner);
        }
    }
}
