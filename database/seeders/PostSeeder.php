<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Polda NTB Gelar Operasi Bina Kusuma Rinjani 2023',
                'excerpt' => 'Operasi ini bertujuan untuk menekan angka kriminalitas dan premanisme di wilayah hukum Polda NTB.',
                'image' => null,
                'category' => 'Operasi',
            ],
            [
                'title' => 'Dir Binmas Hadiri Kegiatan Jumat Curhat di Mataram',
                'excerpt' => 'Kombes Pol Desy Ismail mendengarkan langsung keluhan masyarakat terkait situasi kamtibmas.',
                'image' => null,
                'category' => 'Kegiatan',
            ],
            [
                'title' => 'Sosialisasi Bahaya Narkoba di SMKN 1 Mataram',
                'excerpt' => 'Subdit Bintibsos memberikan penyuluhan kepada siswa-siswi agar menjauhi narkoba.',
                'image' => null,
                'category' => 'Penyuluhan',
            ],
            [
                'title' => 'Pembinaan Satpam Gada Pratama Resmi Ditutup',
                'excerpt' => 'Sebanyak 50 peserta dinyatakan lulus pelatihan dasar satpam.',
                'image' => null,
                'category' => 'Diklat',
            ],
            [
                'title' => 'Bhabinkamtibmas Bantu Warga Terdampak Banjir',
                'excerpt' => 'Polisi RW dan Bhabinkamtibmas bahu-membahu membersihkan sisa lumpur di rumah warga.',
                'image' => null,
                'category' => 'Sosial',
            ],
        ];

        foreach ($posts as $post) {
            \App\Models\Post::create([
                'title' => $post['title'],
                'slug' => Str::slug($post['title']),
                'content' => '<p>' . $post['excerpt'] . ' Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>',
                'thumbnail' => $post['image'], // Ganti image jadi thumbnail
                'tags' => ['Giat Binmas', 'Polda NTB'], // Tambah tags default
                'is_published' => true,
                'author' => 'Admin Binmas', // Ganti author_id jadi author string
            ]);
        }
    }
}
