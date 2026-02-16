{{-- 
    =======================================================
    FILE: bagbinopsnal.blade.php
    =======================================================
--}}
@php
    // 1. DATA SPESIFIK BAG BINOPSNAL
    $data = [
        'nama_satker' => 'BAG BINOPSNAL', 
        'deskripsi'   => 'Bagian Pembinaan Operasional (Bag Binopsnal) bertugas menyelenggarakan administrasi dan pengendalian operasi, pelatihan pra-operasi, serta koordinasi antar fungsi dalam rangka pembinaan keamanan dan ketertiban masyarakat.',
        
        // PIMPINAN
        'pimpinan_foto'   => 'https://ui-avatars.com/api/?name=Kabag+Binops&background=0D8ABC&color=fff&size=200', 
        'pimpinan_nama'   => 'AKBP BUDI SANTOSO, S.I.K.',
        'pimpinan_jabatan'=> 'Kabag Binopsnal',
        'pimpinan_pangkat'=> 'Ajun Komisaris Besar Polisi',

        // TUGAS POKOK
        'tugas_pokok' => 'Menyusun rencana operasi dan pelatihan fungsi teknis Binmas serta menyelenggarakan administrasi operasional kepolisian bidang pembinaan masyarakat.',

        // FUNGSI
        'fungsi' => [
            'Penyusunan rencana operasi kepolisian bidang Binmas (Renops).',
            'Pengendalian pelaksanaan operasi dan kegiatan kepolisian terpusat maupun kewilayahan.',
            'Pelaksanaan pelatihan pra-operasi (Latpraops) fungsi Binmas.',
            'Analisa dan evaluasi (Anev) pelaksanaan tugas operasional.'
        ],

        // STRUKTUR ORGANISASI
        'struktur' => [
            'root' => 'KABAG BINOPSNAL',
            'level_1' => ['PAUR MIN', 'PAUR LANTAS', 'PAUR OPS']
        ]
    ];

    // 2. DATA ANGGOTA
    $anggota = [
        (object)['nama' => 'Kompol Setiawan', 'pangkat' => 'Kompol', 'jabatan' => 'Paur Min', 'foto' => null],
        (object)['nama' => 'AKP Rina Melati', 'pangkat' => 'AKP', 'jabatan' => 'Paur Ops', 'foto' => null],
        (object)['nama' => 'Iptu Gunawan', 'pangkat' => 'Iptu', 'jabatan' => 'Kanit 1', 'foto' => null],
        (object)['nama' => 'Ipda Haryanto', 'pangkat' => 'Ipda', 'jabatan' => 'Kanit 2', 'foto' => null],
        (object)['nama' => 'Aiptu Budi', 'pangkat' => 'Aiptu', 'jabatan' => 'Banum', 'foto' => null],
        (object)['nama' => 'Bripka Santosa', 'pangkat' => 'Bripka', 'jabatan' => 'Banum', 'foto' => null],
    ];
@endphp

{{-- 
    =======================================================
    AREA TAMPILAN (LAYOUT UTAMA)
    =======================================================
--}}

{{-- STYLE KHUSUS UNTUK POHON STRUKTUR (CSS TREE) --}}
<style>
    /* CSS Tree Sederhana - Tidak Diubah */
    .tf-tree ul { display: inline-flex; padding-top: 20px; position: relative; transition: all 0.5s; }
    .tf-tree li { float: left; text-align: center; list-style-type: none; position: relative; padding: 20px 5px 0 5px; transition: all 0.5s; }
    .tf-tree li::before, .tf-tree li::after { content: ''; position: absolute; top: 0; right: 50%; border-top: 2px solid #ccc; width: 50%; height: 20px; }
    .tf-tree li::after { right: auto; left: 50%; border-left: 2px solid #ccc; }
    .tf-tree li:only-child::after, .tf-tree li:only-child::before { display: none; }
    .tf-tree li:only-child { padding-top: 0; }
    .tf-tree li:first-child::before, .tf-tree li:last-child::after { border: 0 none; }
    .tf-tree li:last-child::before { border-right: 2px solid #ccc; border-radius: 0 5px 0 0; }
    .tf-tree li:first-child::after { border-radius: 5px 0 0 0; }
    .tf-tree ul ul::before { content: ''; position: absolute; top: 0; left: 50%; border-left: 2px solid #ccc; width: 0; height: 20px; }
    .tf-tree li a { border: 2px solid #ccc; padding: 10px 20px; text-decoration: none; color: #666; font-family: arial, verdana, tahoma; font-size: 14px; font-weight: bold; display: inline-block; border-radius: 5px; background-color: white; transition: all 0.5s; }
    .tf-tree li a:hover, .tf-tree li a:hover+ul li a { background: #c8e4f8; color: #000; border: 2px solid #94a0b4; }
    .tf-tree li a:hover+ul li::after, .tf-tree li a:hover+ul li::before, .tf-tree li a:hover+ul::before, .tf-tree li a:hover+ul ul::before { border-color: #94a0b4; }
</style>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-8 fade-in-up">

    {{-- KOLOM KIRI: Konten Utama (2/3 Lebar) --}}
    <div class="lg:col-span-2 space-y-8">
        
        {{-- 1. Kartu Pimpinan --}}
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden border border-gray-100 flex flex-col md:flex-row">
            <div class="w-full md:w-1/3 h-64 md:h-auto relative group">
                <img src="{{ $data['pimpinan_foto'] }}" 
                     alt="Foto Pimpinan" 
                     class="w-full h-full object-cover transition transform group-hover:scale-105 duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent md:hidden"></div>
            </div>
            <div class="w-full md:w-2/3 p-6 flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-2">
                    <span class="bg-yellow-100 text-yellow-700 text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider">Pimpinan</span>
                    <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-md uppercase tracking-wider">Kepala Satker</span>
                </div>
                <h2 class="text-2xl font-bold text-gray-800 mb-1">{{ $data['pimpinan_nama'] }}</h2>
                <p class="text-lg text-primary font-medium mb-1">{{ $data['pimpinan_jabatan'] }}</p>
                <p class="text-sm text-gray-500">{{ $data['pimpinan_pangkat'] }}</p>
                
                <hr class="my-4 border-gray-200">
                
                <div class="prose text-gray-600 text-sm leading-relaxed">
                    {{ $data['deskripsi'] }}
                </div>
            </div>
        </div>

        {{-- 2. Tugas & Fungsi --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4 flex items-center">
                <span class="material-icons mr-2 text-primary">assignment</span> Tugas & Fungsi
            </h3>
            
            <div class="mb-6 bg-blue-50 p-4 rounded-xl border-l-4 border-primary">
                <h4 class="font-bold text-gray-800 mb-2">Tugas Pokok</h4>
                <p class="text-gray-700">{{ $data['tugas_pokok'] }}</p>
            </div>

            <div>
                <h4 class="font-bold text-gray-800 mb-3">Fungsi Utama</h4>
                <ul class="space-y-2">
                    @foreach($data['fungsi'] as $fungsi)
                    <li class="flex items-start">
                        <span class="material-icons text-green-500 text-sm mt-1 mr-2">check_circle</span>
                        <span class="text-gray-700">{{ $fungsi }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- 3. Struktur Organisasi --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 overflow-x-auto">
            <h3 class="text-xl font-bold text-gray-800 border-b pb-3 mb-4 flex items-center">
                <span class="material-icons mr-2 text-primary">account_tree</span> Struktur Organisasi
            </h3>
            
            <div class="tf-tree text-center min-w-max flex justify-center pb-4">
                <ul>
                    <li>
                        <a href="#" class="!bg-primary !text-white !border-primary">{{ $data['struktur']['root'] }}</a>
                        @if(count($data['struktur']['level_1']) > 0)
                        <ul>
                            @foreach($data['struktur']['level_1'] as $cabang)
                            <li>
                                <a href="#">{{ $cabang }}</a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- KOLOM KANAN: Daftar Anggota --}}
    <div class="lg:col-span-1">
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 sticky top-8">
            <div class="flex justify-between items-end border-b pb-3 mb-4">
                <div>
                    <h3 class="text-xl font-bold text-gray-800">Personil</h3>
                    <p class="text-xs text-gray-500 mt-1">Daftar Anggota Satuan</p>
                </div>
                <div class="text-right">
                    <span class="text-3xl font-bold text-primary">{{ count($anggota) }}</span>
                    <span class="text-xs text-gray-500 block">Orang</span>
                </div>
            </div>

            <div class="space-y-4 max-h-[800px] overflow-y-auto pr-2 custom-scrollbar">
                @foreach($anggota as $personil)
                <div class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-50 transition border border-transparent hover:border-gray-200">
                    <div class="flex-shrink-0">
                        <img class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                             src="{{ $personil->foto ?? 'https://ui-avatars.com/api/?name='.urlencode($personil->nama).'&background=random' }}" 
                             alt="{{ $personil->nama }}">
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-900 truncate">
                            {{ $personil->nama }}
                        </p>
                        <p class="text-xs text-primary truncate">
                            {{ $personil->jabatan }}
                        </p>
                        <p class="text-[10px] text-gray-500">
                            {{ $personil->pangkat }}
                        </p>
                    </div>
                </div>
                @endforeach

                @if(count($anggota) === 0)
                    <p class="text-center text-gray-400 italic text-sm py-4">Data anggota belum diinput.</p>
                @endif
            </div>

            <div class="mt-6 pt-6 border-t border-gray-100">
                <button class="w-full flex items-center justify-center space-x-2 bg-gray-50 hover:bg-gray-100 text-gray-700 py-3 rounded-xl transition">
                    <span class="material-icons text-red-500">smart_display</span>
                    <span class="font-medium text-sm">Lihat Dokumentasi Kegiatan</span>
                </button>
            </div>
        </div>
    </div>

</div>

{{-- 
    ====================================================================
    BAGIAN KONTEN TAMBAHAN (UMUM & KHUSUS)
    ====================================================================
--}}

<div class="mt-16 border-t border-gray-200 pt-10">
    
    {{-- A. KONTEN KHUSUS BINOPSNAL (Menggunakan Layout Orange dari Desain Sebelumnya) --}}
    <div class="mb-12">
        <h3 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
            {{-- Menggunakan Icon yang relevan dengan Operasi --}}
            <span class="material-icons text-orange-500 mr-2">event_available</span> Agenda Operasi & Pelatihan
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            
            {{-- TABEL AGENDA (Gantikan Tabel Satpam) --}}
            <div class="bg-orange-50 rounded-xl p-6 border border-orange-100">
                <h4 class="font-bold text-gray-800 mb-3">Jadwal Operasi Kepolisian Terpusat/Kewilayahan</h4>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left">
                        <thead class="text-xs text-gray-700 uppercase bg-orange-200">
                            <tr>
                                <th class="px-3 py-2">Nama Operasi</th>
                                <th class="px-3 py-2">Waktu</th>
                                <th class="px-3 py-2">Status</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <tr class="border-b">
                                <td class="px-3 py-2">Ops Bina Kusuma</td>
                                <td class="px-3 py-2">10 - 24 Okt</td>
                                <td class="px-3 py-2"><span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Berjalan</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-3 py-2">Ops Bina Waspada</td>
                                <td class="px-3 py-2">01 - 14 Nov</td>
                                <td class="px-3 py-2"><span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded">Persiapan</span></td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-3 py-2">Latpraops Lilin</td>
                                <td class="px-3 py-2">15 Des</td>
                                <td class="px-3 py-2"><span class="bg-gray-100 text-gray-600 text-xs px-2 py-1 rounded">Terjadwal</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button class="mt-4 text-xs font-bold text-orange-600 hover:underline">Lihat Kalender Lengkap →</button>
            </div>
            
            {{-- BOX SAMPING (Administrasi Operasi) --}}
            <div class="bg-white rounded-xl p-6 border border-gray-200 shadow-sm flex flex-col justify-center text-center">
                <span class="material-icons text-4xl text-gray-400 mb-2">folder_shared</span>
                <h4 class="font-bold text-gray-800">Bank Data Operasi</h4>
                <p class="text-sm text-gray-500 mb-4">Akses dokumen Rencana Operasi (Renops) dan Petunjuk Arahan (Jukrah) pimpinan.</p>
                <div class="flex gap-2">
                    <input type="text" placeholder="Cari Nama Operasi..." class="w-full border rounded-lg px-3 py-2 text-sm">
                    <button class="bg-primary text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Cari</button>
                </div>
            </div>
        </div>
    </div>


    {{-- B. KONTEN UMUM (Tetap Dipertahankan) --}}
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        
        {{-- 1. Regulasi & SOP --}}
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons text-red-500 mr-2">gavel</span> Regulasi & SOP
            </h3>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 divide-y">
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 cursor-pointer transition">
                    <div class="flex items-center gap-3">
                        <div class="bg-red-100 p-2 rounded-lg text-red-600">
                            <span class="material-icons text-sm">picture_as_pdf</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">Perkap Manajemen Ops</p>
                            <p class="text-xs text-gray-500">Peraturan Kapolri</p>
                        </div>
                    </div>
                    <span class="material-icons text-gray-400 text-sm">download</span>
                </div>
                <div class="p-4 flex items-center justify-between hover:bg-gray-50 cursor-pointer transition">
                    <div class="flex items-center gap-3">
                        <div class="bg-blue-100 p-2 rounded-lg text-blue-600">
                            <span class="material-icons text-sm">description</span>
                        </div>
                        <div>
                            <p class="text-sm font-bold text-gray-800">SOP Pelaporan Harian</p>
                            <p class="text-xs text-gray-500">Standar Operasional Prosedur</p>
                        </div>
                    </div>
                    <span class="material-icons text-gray-400 text-sm">visibility</span>
                </div>
            </div>

            {{-- FAQ Accordion --}}
            <div class="mt-6">
                <h4 class="font-bold text-gray-800 mb-3 text-sm uppercase tracking-wide">FAQ (Tanya Jawab)</h4>
                <div class="space-y-2">
                    <details class="group bg-white border border-gray-200 rounded-lg">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-3">
                            <span class="text-sm text-gray-700">Kapan batas waktu pengumpulan laporan?</span>
                            <span class="transition group-open:rotate-180">
                                <span class="material-icons text-gray-400">expand_more</span>
                            </span>
                        </summary>
                        <div class="text-gray-600 text-sm p-3 border-t bg-gray-50">
                            Laporan harian operasi dikirimkan paling lambat pukul 18.00 WITA setiap harinya melalui Posko Operasi.
                        </div>
                    </details>
                    <details class="group bg-white border border-gray-200 rounded-lg">
                        <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-3">
                            <span class="text-sm text-gray-700">Bagaimana mengajukan dukungan anggaran?</span>
                            <span class="transition group-open:rotate-180">
                                <span class="material-icons text-gray-400">expand_more</span>
                            </span>
                        </summary>
                        <div class="text-gray-600 text-sm p-3 border-t bg-gray-50">
                            Pengajuan Rencana Kebutuhan Anggaran (Renbut) diajukan sebelum operasi dimulai melalui Subbag Renmin.
                        </div>
                    </details>
                </div>
            </div>
        </div>

        {{-- 2. Galeri Kegiatan & Agenda --}}
        <div>
            <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons text-purple-500 mr-2">event_note</span> Galeri & Agenda
            </h3>
            
            <div class="grid grid-cols-2 gap-2 mb-6">
                <img src="https://source.unsplash.com/400x300/?police,briefing" class="rounded-lg object-cover w-full h-32 hover:opacity-90 transition cursor-pointer">
                <img src="https://source.unsplash.com/400x300/?police,training" class="rounded-lg object-cover w-full h-32 hover:opacity-90 transition cursor-pointer">
                <img src="https://source.unsplash.com/400x300/?security,meeting" class="rounded-lg object-cover w-full h-32 hover:opacity-90 transition cursor-pointer">
                <div class="rounded-lg bg-gray-100 flex items-center justify-center h-32 cursor-pointer hover:bg-gray-200 transition">
                    <span class="text-xs text-gray-500 font-bold">+ Lihat Semua</span>
                </div>
            </div>

            <div class="bg-white border border-gray-200 rounded-xl p-4">
                <h4 class="font-bold text-gray-800 text-sm mb-3">Agenda Kegiatan Terdekat</h4>
                <div class="flex gap-3 items-start border-l-2 border-primary pl-3">
                    <div class="text-center min-w-[50px]">
                        <span class="block text-xs font-bold text-gray-500">OKT</span>
                        <span class="block text-xl font-bold text-primary">24</span>
                    </div>
                    <div>
                        <p class="text-sm font-bold text-gray-800">Anev Bulanan Operasi</p>
                        <p class="text-xs text-gray-500">Ruang Rapat Ditbinmas, 09.00 WITA</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>