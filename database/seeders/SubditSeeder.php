<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SubditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subdits = [
            [
                'name' => 'Bag Binopsnal',
                'deskripsi' => 'Bagian Pembinaan Operasional (Bag Binopsnal) bertugas menyelenggarakan pembinaan manajemen operasional kepolisian, perencanaan operasi, dan pelatihan pra-operasi serta koordinasi lintas sektoral dalam rangka pemeliharaan keamanan dan ketertiban masyarakat.',
                'tugas_pokok' => '<ul><li>Merencanakan dan mengendalikan operasi kepolisian terpusat dan kewilayahan.</li><li>Menyiapkan administrasi dan dukungan anggaran operasi.</li><li>Mengumpulkan dan mengolah data gangguan kamtibmas.</li></ul>',
                'image' => null,
            ],
            [
                'name' => 'Subdit Binpolmas',
                'deskripsi' => 'Subdirektorat Pembinaan Perpolisian Masyarakat (Binpolmas) bertugas menyelenggarakan pembinaan dan pengembangan strategi Polmas, serta menjalin kemitraan dengan masyarakat, instansi pemerintah, dan organisasi non-pemerintah.',
                'tugas_pokok' => '<ul><li>Melaksanakan pembinaan teknis Polmas kepada satuan kewilayahan.</li><li>Membangun kemitraan dengan tokoh masyarakat, tokoh agama, dan tokoh adat.</li><li>Melaksanakan supervisi dan asistensi fungsi Binmas di kewilayahan.</li></ul>',
                'image' => null,
            ],
            [
                'name' => 'Subdit Binsatpam/Polsus',
                'deskripsi' => 'Subdirektorat Pembinaan Satuan Pengamanan dan Polisi Khusus (Binsatpam/Polsus) bertugas melakukan pembinaan teknis, pelatihan, dan pengawasan terhadap Satuan Pengamanan (Satpam) dan Kepolisian Khusus (Polsus) serta bentuk-bentuk pengamanan swakarsa lainnya.',
                'tugas_pokok' => '<ul><li>Memberikan petunjuk teknis pelaksanaan tugas Satpam dan Polsus.</li><li>Menyelenggarakan pelatihan Gada Pratama, Gada Madya, dan Gada Utama.</li><li>Melakukan audit sistem pengamanan pada obyek vital dan instansi pengguna Satpam/Polsus.</li></ul>',
                'image' => null,
            ],
            [
                'name' => 'Subdit Bintibsos',
                'deskripsi' => 'Subdirektorat Pembinaan Ketertiban Sosial (Bintibsos) bertugas melakukan pembinaan dan penyuluhan kepada masyarakat guna menumbuhkan kesadaran hukum dan mencegah terjadinya penyakit masyarakat serta gangguan ketertiban sosial lainnya.',
                'tugas_pokok' => '<ul><li>Melaksanakan penyuluhan hukum dan kamtibmas kepada pelajar, mahasiswa, dan masyarakat umum.</li><li>Melakukan pembinaan terhadap kelompok rentan dan komunitas masyarakat.</li><li>Mencegah berkembangnya paham radikalisme dan intoleransi.</li></ul>',
                'image' => null,
            ],
            [
                'name' => 'Subdit Bhabinkamtibmas',
                'deskripsi' => 'Subdirektorat Bhayangkara Pembina Keamanan dan Ketertiban Masyarakat (Bhabinkamtibmas) bertugas membina, mengarahkan, dan mengawasi pelaksanaan tugas Bhabinkamtibmas di tingkat desa/kelurahan sebagai ujung tombak Polri di tengah masyarakat.',
                'tugas_pokok' => '<ul><li>Menyiapkan petunjuk arahan dan pelatihan peningkatan kemampuan Bhabinkamtibmas.</li><li>Melakukan analisis dan evaluasi kinerja Bhabinkamtibmas.</li><li>Mengoptimalkan peran Bhabinkamtibmas dalam *Problem Solving* dan Deteksi Dini.</li></ul>',
                'image' => null,
            ],
            [
                'name' => 'Subbag Renmin',
                'deskripsi' => 'Subbagian Perencanaan dan Administrasi (Subbag Renmin) bertugas menyelenggarakan penyusunan perencanaan kerja dan anggaran, pengelolaan sumber daya manusia, logistik, serta pelayanan administrasi umum dan ketatausahaan di lingkungan Direktorat.',
                'tugas_pokok' => '<ul><li>Menyusun Rencana Kerja (Renja) dan Rencana Strategis (Renstra) Direktorat.</li><li>Mengelola administrasi personel, kenaikan pangkat, dan pengembangan karir.</li><li>Menyelenggarakan urusan surat-menyurat, kearsipan, dan pelayanan markas.</li></ul>',
                'image' => null,
            ],
        ];

        foreach ($subdits as $data) {
            \App\Models\Satker::updateOrCreate(
                ['slug' => Str::slug($data['name'])], // Check by slug
                [
                    'name' => $data['name'],
                    'deskripsi' => $data['deskripsi'],
                    'tugas_pokok' => $data['tugas_pokok'],
                    'fungsi' => ['Fungsi Default 1', 'Fungsi Default 2'],
                    'documents' => [],
                    'agenda' => [], // Added agenda
                    'faq' => [],    // Added faq
                    'slug' => Str::slug($data['name']),
                ]
            );
        }
    }
}
