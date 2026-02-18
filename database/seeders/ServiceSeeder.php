<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Registrasi Satpam',
                'description' => 'Pendaftaran KTA dan Pelayanan SIK Satpam secara online.',
                'icon' => 'assignment_ind',
                'link' => '#',
            ],
            [
                'title' => 'Ijin Usaha BUJP',
                'description' => 'Pengajuan dan Perpanjangan Surat Ijin Operasional Badan Usaha Jasa Pengamanan.',
                'icon' => 'business_center',
                'link' => '#',
            ],
            [
                'title' => 'Pelaporan Tamu Wajib Lapor',
                'description' => 'Layanan pelaporan tamu asing dan pendatang baru di lingkungan RT/RW.',
                'icon' => 'record_voice_over',
                'link' => '#',
            ],
             [
                'title' => 'Pengaduan Masyarakat',
                'description' => 'Saluran pengaduan masyarakat terkait gangguan kamtibmas.',
                'icon' => 'report_problem',
                'link' => '#',
            ],
        ];

        foreach ($services as $service) {
            \App\Models\Service::create($service);
        }
    }
}
