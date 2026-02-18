<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultData = [
            // --- HOME PAGE ---
            [
                'page' => 'home',
                'section' => 'hero',
                'key' => 'title',
                'content' => 'Mengayomi & Melindungi <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Masyarakat NTB</span>',
                'image' => null,
            ],
            [
                'page' => 'home',
                'section' => 'hero',
                'key' => 'content',
                'content' => 'Direktorat Binmas Polda NTB berkomitmen membangun kemitraan yang kuat dengan masyarakat untuk menciptakan keamanan dan ketertiban yang kondusif.',
                'image' => null, // Image path
            ],
            [
                'page' => 'home',
                'section' => 'sambutan',
                'key' => 'title',
                'content' => 'Mewujudkan Kamtibmas yang <span class="relative text-primary dark:text-accent z-10">Kondusif</span> Melalui Kemitraan.',
                'image' => null,
            ],
            [
                'page' => 'home',
                'section' => 'sambutan',
                'key' => 'content',
                'content' => '<p>Selamat datang di website resmi Direktorat Pembinaan Masyarakat (Ditbinmas) Polda Nusa Tenggara Barat. Kami hadir sebagai wujud nyata Polri yang Presisi dalam memberikan pelayanan, perlindungan, dan pengayoman kepada masyarakat.</p><p>Melalui platform digital ini, kami berupaya mendekatkan diri dengan masyarakat, menyediakan informasi terkini, serta membuka saluran komunikasi yang efektif untuk bersama-sama menjaga stabilitas keamanan di wilayah hukum Polda NTB.</p>',
                'image' => null,
            ],
            [
                'page' => 'home',
                'section' => 'sambutan',
                'key' => 'name',
                'content' => 'Kombes Pol Desy Ismail, S.I.K.',
                'image' => null,
            ],
            [
                'page' => 'home',
                'section' => 'sambutan',
                'key' => 'image', // Image for Sambutan
                'content' => null,
                'image' => null, 
            ],

            // --- PROFIL PAGE ---
            [
                'page' => 'profil',
                'section' => 'sejarah',
                'key' => 'sejarah', // Using 'key' as used in Controller mapping: $profileData['sejarah']
                'content' => '<p>Direktorat Pembinaan Masyarakat (Ditbinmas) Polda NTB memiliki sejarah panjang dalam mengemban tugas kepolisian di bidang pembinaan masyarakat. Sejak berdirinya Polda NTB, fungsi Binmas telah menjadi ujung tombak dalam menciptakan situasi kondusif melalui pendekatan preemtif.</p><p>Seiring dengan perkembangan zaman dan dinamika masyarakat, Ditbinmas terus bertransformasi meningkatkan kualitas pelayanan dan strategi pemolisian masyarakat (Polmas) guna mewujudkan keamanan dan ketertiban yang berkelanjutan.</p>',
                'image' => null,
            ],
            [
                'page' => 'profil',
                'section' => 'visi-misi',
                'key' => 'visi',
                'content' => '<p>Terwujudnya masyarakat Nusa Tenggara Barat yang aman, tertib, dan patuh hukum serta terjalinnya kemitraan yang sinergis antara Polri dan masyarakat.</p>',
                'image' => null,
            ],
            [
                'page' => 'profil',
                'section' => 'visi-misi',
                'key' => 'misi',
                'content' => '<ul><li>Memberikan perlindungan, pengayoman, dan pelayanan kepada masyarakat.</li><li>Menyelenggarakan pembinaan masyarakat yang meliputi kegiatan pemberdayaan Polmas, ketertiban sosial, dan kegiatan koordinasi dengan bentuk-bentuk pengamanan swakarsa.</li><li>Meningkatkan kesadaran hukum dan partisipasi masyarakat dalam menjaga Kamtibmas.</li></ul>',
                'image' => null,
            ],

            // --- CONTACT PAGE ---
            [
                'page' => 'contact',
                'section' => 'main',
                'key' => 'address',
                'content' => 'Jl. Gajah Mada No. 07, Pagesangan,<br>Kec. Mataram, Kota Mataram,<br>Nusa Tenggara Barat 83127',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'main',
                'key' => 'phone',
                'content' => '(0370) 642xxx',
                'image' => null,
            ],
             [
                'page' => 'contact',
                'section' => 'main',
                'key' => 'fax',
                'content' => '(0370) 642xxx',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'main',
                'key' => 'email',
                'content' => 'ditbinmas@ntb.polri.go.id',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'main',
                'key' => 'website',
                'content' => 'ntb.polri.go.id',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'social',
                'key' => 'instagram_url',
                'content' => 'https://instagram.com/ditbinmas_poldantb',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'social',
                'key' => 'facebook_url',
                'content' => 'https://facebook.com/ditbinmaspoldantb',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'social',
                'key' => 'twitter_url',
                'content' => 'https://twitter.com/poldantb',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'social',
                'key' => 'youtube_url',
                'content' => 'https://youtube.com/c/PoldaNTBOfficial',
                'image' => null,
            ],
            [
                'page' => 'contact',
                'section' => 'map',
                'key' => 'map_embed',
                'content' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.066547370682!2d116.10875731478347!3d-8.58960299382379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c23d8659f%3A0x67396652433f829!2sPolda%20Nusa%20Tenggara%20Barat!5e0!3m2!1sid!2sid!4v1625632123456!5m2!1sid!2sid',
                'image' => null,
            ],
        ];

        foreach ($defaultData as $data) {
            \App\Models\PageContent::updateOrCreate(
                [
                    'page' => $data['page'],
                    'section' => $data['section'],
                    'key' => $data['key'],
                ],
                [
                    'content' => $data['content'],
                    'image' => $data['image'],
                ]
            );
        }
    }
}
