{{-- 
    =======================================================
    FILE: subbagrenmin.blade.php
    =======================================================
--}}
@php
    // 1. DATA SPESIFIK SUBBAG RENMIN
    $data = [
        'nama_satker' => 'SUBBAG RENMIN', 
        'deskripsi'   => 'Subbagian Perencanaan dan Administrasi (Subbag Renmin) bertugas menyusun perencanaan kerja dan anggaran, pengelolaan dan pembinaan manajemen personel dan logistik, serta pelayanan administrasi dan ketatausahaan.',
        
        // PIMPINAN
        'pimpinan_foto'   => 'https://ui-avatars.com/api/?name=Kasubbag+Renmin&background=6D28D9&color=fff&size=200',
        'pimpinan_nama'   => 'KOMPOL ADI WIJAYA, S.H.',
        'pimpinan_jabatan'=> 'Kasubbag Renmin',
        'pimpinan_pangkat'=> 'Komisaris Polisi',

        // TUGAS POKOK
        'tugas_pokok' => 'Menyusun Perencanaan Strategis (Renstra), Rancangan Anggaran (RKA-KL), serta memberikan pelayanan administrasi personel, materiil logistik, dan ketatausahaan umum.',

        // FUNGSI
        'fungsi' => [
            'Penyusunan dokumen perencanaan (Renstra, Renja) dan anggaran (DIPA).',
            'Pelayanan administrasi personel (Kenaikan Pangkat, Gaji, Cuti).',
            'Pengelolaan materiil logistik dan aset dinas (SIMAK BMN).',
            'Pelayanan ketatausahaan dan urusan dalam (Sium).'
        ],

        // STRUKTUR ORGANISASI
        'struktur' => [
            'root' => 'KASUBBAG RENMIN',
            'level_1' => ['UR REN', 'UR MIN', 'UR KEU', 'UR TU']
        ]
    ];

    // 2. DATA ANGGOTA RENMIN
    $anggota = [
        (object)['nama' => 'Iptu Candra', 'pangkat' => 'Iptu', 'jabatan' => 'Paur Ren', 'foto' => null],
        (object)['nama' => 'Ipda Dewi Sartika', 'pangkat' => 'Ipda', 'jabatan' => 'Paur Min', 'foto' => null],
        (object)['nama' => 'Aiptu Herman', 'pangkat' => 'Aiptu', 'jabatan' => 'Bamin Keu', 'foto' => null],
        (object)['nama' => 'Bripka Joko', 'pangkat' => 'Bripka', 'jabatan' => 'Bamin Log', 'foto' => null],
        (object)['nama' => 'Brigadir Siti', 'pangkat' => 'Brigadir', 'jabatan' => 'Banum', 'foto' => null],
        (object)['nama' => 'Pengatur Tk.I Rina', 'pangkat' => 'PNS', 'jabatan' => 'Banum', 'foto' => null],
    ];
@endphp

{{-- 
    =======================================================
    AREA TAMPILAN (LAYOUT UTAMA - DESAIN TETAP)
    =======================================================
--}}

{{-- STYLE CSS TREE --}}
<style>
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
    .tf-tree li a { border: 2px solid #ccc; padding: 10px 20px; text-decoration: none; color: #666; font-family: arial, verdana, tahoma; font-size: 14px; font-weight: bold; display: inline-block; border-radius: 5px; background-color: white; transition: all 0.3s; }
    .tf-tree li a:hover { background: #0D8ABC; color: #fff; border-color: #0D8ABC; transform: translateY(-3px); box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
</style>

<div class="grid grid-cols-1 lg:grid-cols-12 gap-8 fade-in-up items-start">

    {{-- KOLOM KIRI: KONTEN UTAMA (Lebar 8/12) --}}
    <div class="lg:col-span-8 space-y-10">
        
        {{-- 1. Kartu Pimpinan --}}
        <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 flex flex-col md:flex-row relative">
            <div class="w-full md:w-5/12 h-72 md:h-auto relative group overflow-hidden">
                <img src="{{ $data['pimpinan_foto'] }}" alt="Foto Pimpinan" class="w-full h-full object-cover transition transform group-hover:scale-105 duration-700">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent md:bg-gradient-to-r md:from-transparent md:to-black/10"></div>
            </div>
            <div class="w-full md:w-7/12 p-8 flex flex-col justify-center">
                <div class="flex items-center gap-2 mb-3">
                    <span class="bg-blue-100 text-blue-700 text-[10px] font-extrabold px-2 py-1 rounded uppercase tracking-wider">Kepala Satker</span>
                </div>
                <h2 class="text-3xl font-bold text-gray-800 leading-tight mb-1">{{ $data['pimpinan_nama'] }}</h2>
                <p class="text-lg text-primary font-medium mb-1">{{ $data['pimpinan_jabatan'] }}</p>
                <p class="text-sm text-gray-400 font-semibold">{{ $data['pimpinan_pangkat'] }}</p>
                <hr class="my-5 border-gray-100">
                <p class="text-gray-600 text-sm leading-relaxed">{{ $data['deskripsi'] }}</p>
            </div>
        </div>

        {{-- 2. Tugas & Fungsi --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- Tugas Pokok --}}
            <div class="bg-blue-50 rounded-2xl p-6 border border-blue-100 relative overflow-hidden">
                <div class="absolute right-0 top-0 w-24 h-24 bg-blue-100 rounded-bl-full opacity-50 -mr-4 -mt-4"></div>
                <h3 class="text-lg font-bold text-blue-900 mb-3 flex items-center relative z-10">
                    <span class="material-icons mr-2">assignment</span> Tugas Pokok
                </h3>
                <p class="text-blue-800 text-sm leading-relaxed relative z-10">
                    {{ $data['tugas_pokok'] }}
                </p>
            </div>
            
            {{-- Fungsi --}}
            <div class="bg-white rounded-2xl p-6 border border-gray-200 shadow-sm">
                <h3 class="text-lg font-bold text-gray-800 mb-3 flex items-center">
                    <span class="material-icons mr-2 text-primary">engineering</span> Fungsi Utama
                </h3>
                <ul class="space-y-3">
                    @foreach($data['fungsi'] as $fungsi)
                    <li class="flex items-start text-sm text-gray-600">
                        <span class="material-icons text-green-500 text-base mr-2 mt-0.5">check_circle</span>
                        <span>{{ $fungsi }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>

        {{-- 3. Struktur Organisasi --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 border-b pb-4 mb-6 flex items-center">
                <span class="material-icons mr-2 text-primary">account_tree</span> Struktur Organisasi
            </h3>
            <div class="overflow-x-auto pb-4">
                <div class="tf-tree text-center min-w-max flex justify-center">
                    <ul>
                        <li>
                            <a href="javascript:void(0)" class="!bg-primary !text-white !border-primary cursor-default shadow-md">
                                {{ $data['struktur']['root'] }}
                            </a>
                            @if(count($data['struktur']['level_1']) > 0)
                            <ul>
                                @foreach($data['struktur']['level_1'] as $cabang)
                                <li><a href="javascript:void(0)" class="cursor-default">{{ $cabang }}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- 4. FITUR KHUSUS RENMIN (Layanan Personil & Anggaran) --}}
        <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl shadow-lg p-8 border border-blue-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <span class="material-icons text-blue-600 mr-2">manage_accounts</span> Layanan Personil & Anggaran
            </h3>
            
            {{-- Tabel Status Usulan --}}
            <div class="overflow-hidden rounded-xl border border-blue-200 mb-6">
                <table class="w-full text-sm text-left">
                    <thead class="text-xs text-blue-900 uppercase bg-blue-100">
                        <tr>
                            <th class="px-4 py-3">Layanan</th>
                            <th class="px-4 py-3">Periode</th>
                            <th class="px-4 py-3">Status Saat Ini</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-blue-50">
                        <tr>
                            <td class="px-4 py-3 font-medium">Usulan Kenaikan Pangkat (UKP)</td>
                            <td class="px-4 py-3">Juli 2024</td>
                            <td class="px-4 py-3"><span class="bg-yellow-100 text-yellow-800 text-xs px-2 py-1 rounded font-bold">Verifikasi Polda</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium">Kenaikan Gaji Berkala (KGB)</td>
                            <td class="px-4 py-3">Semester I 2024</td>
                            <td class="px-4 py-3"><span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded font-bold">Selesai</span></td>
                        </tr>
                        <tr>
                            <td class="px-4 py-3 font-medium">Penyusunan RKA-KL</td>
                            <td class="px-4 py-3">TA. 2025</td>
                            <td class="px-4 py-3"><span class="bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded font-bold">Pagu Indikatif</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Cek Status Surat / Dokumen --}}
            <div class="bg-white p-4 rounded-xl border border-gray-200 flex gap-4 items-center">
                <div class="bg-blue-100 p-2 rounded-lg text-blue-600"><span class="material-icons">mark_email_read</span></div>
                <div class="flex-1">
                    <h5 class="font-bold text-gray-800 text-sm">Cek Disposisi Surat</h5>
                    <p class="text-xs text-gray-500">Masukkan Nomor Agenda Surat Masuk untuk melacak disposisi.</p>
                </div>
                <div class="flex gap-2">
                    <input type="text" placeholder="No. Agenda..." class="w-32 border rounded-lg px-2 py-1 text-xs">
                    <button class="px-3 py-1 bg-blue-600 text-white text-xs font-bold rounded-lg hover:bg-blue-700">Cek</button>
                </div>
            </div>
        </div>

        {{-- 5. FAQ (Tanya Jawab - Renmin) --}}
        <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100">
            <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                <span class="material-icons mr-2 text-purple-500">quiz</span> FAQ (Tanya Jawab)
            </h3>
            <div class="space-y-3">
                <details class="group bg-gray-50 rounded-lg overflow-hidden">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 hover:bg-gray-100 transition">
                        <span class="text-sm text-gray-700 font-bold">Apa syarat pengajuan Cuti Tahunan?</span>
                        <span class="transition group-open:rotate-180 material-icons text-gray-400 text-sm">expand_more</span>
                    </summary>
                    <div class="text-gray-600 text-sm p-4 border-t border-gray-100 bg-white">
                        Mengisi blangko pengajuan cuti, diketahui Kasubdit/Kabag masing-masing, dan sisa cuti masih tersedia. Diajukan minimal H-3.
                    </div>
                </details>
                <details class="group bg-gray-50 rounded-lg overflow-hidden">
                    <summary class="flex justify-between items-center font-medium cursor-pointer list-none p-4 hover:bg-gray-100 transition">
                        <span class="text-sm text-gray-700 font-bold">Bagaimana prosedur permintaan ATK?</span>
                        <span class="transition group-open:rotate-180 material-icons text-gray-400 text-sm">expand_more</span>
                    </summary>
                    <div class="text-gray-600 text-sm p-4 border-t border-gray-100 bg-white">
                        Membuat bon permintaan barang (bon gudang) yang ditandatangani Kasatker, kemudian diserahkan ke Ur Min Logistik.
                    </div>
                </details>
            </div>
        </div>

    </div>

    {{-- KOLOM KANAN: SIDEBAR (Lebar 4/12) - STICKY --}}
    <div class="lg:col-span-4 space-y-8 sticky top-24">
        
        {{-- 1. Daftar Personil --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <div class="flex justify-between items-center border-b pb-3 mb-4">
                <h3 class="text-lg font-bold text-gray-800 flex items-center">
                    <span class="material-icons mr-2 text-primary">groups</span> Personil
                </h3>
                <span class="bg-primary/10 text-primary text-xs font-bold px-2 py-1 rounded-full">{{ count($anggota) }} Org</span>
            </div>
            <div class="space-y-3 max-h-[400px] overflow-y-auto pr-2 custom-scrollbar">
                @foreach($anggota as $personil)
                <div class="flex items-center space-x-3 p-2 rounded-lg hover:bg-gray-50 transition">
                    <img class="h-10 w-10 rounded-full object-cover border border-gray-200" 
                         src="{{ $personil->foto ?? 'https://ui-avatars.com/api/?name='.urlencode($personil->nama).'&background=random' }}" 
                         alt="{{ $personil->nama }}">
                    <div class="flex-1 min-w-0">
                        <p class="text-sm font-bold text-gray-800 truncate">{{ $personil->nama }}</p>
                        <p class="text-[10px] uppercase tracking-wide text-primary font-bold truncate">{{ $personil->jabatan }}</p>
                        <p class="text-[10px] text-gray-400">{{ $personil->pangkat }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        {{-- 2. Galeri & Agenda --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons text-pink-500 mr-2">photo_camera</span> Giat Terkini
            </h3>
            <div class="grid grid-cols-3 gap-2 mb-4">
                <img src="https://source.unsplash.com/200x200/?office,meeting" class="rounded-lg object-cover w-full h-16 hover:opacity-80 transition cursor-pointer">
                <img src="https://source.unsplash.com/200x200/?paperwork,desk" class="rounded-lg object-cover w-full h-16 hover:opacity-80 transition cursor-pointer">
                <div class="rounded-lg bg-gray-100 flex items-center justify-center h-16 cursor-pointer hover:bg-gray-200 text-xs font-bold text-gray-500">+5</div>
            </div>
            
            <div class="bg-gray-50 border border-gray-200 rounded-lg p-3">
                <div class="flex gap-3 items-center">
                    <div class="bg-white border border-gray-200 rounded p-1 text-center min-w-[40px]">
                        <span class="block text-[10px] font-bold text-red-500">NOV</span>
                        <span class="block text-lg font-bold text-gray-800">10</span>
                    </div>
                    <div>
                        <p class="text-xs font-bold text-gray-800 line-clamp-1">Rapat Penyusunan DIPA</p>
                        <p class="text-[10px] text-gray-500">Aula Ditbinmas</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. Area Download / Regulasi (Renmin) --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
            <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                <span class="material-icons text-red-500 mr-2">description</span> Dokumen Penting
            </h3>
            <ul class="space-y-2">
                <li class="flex items-center justify-between p-2 hover:bg-gray-50 rounded cursor-pointer group">
                    <div class="flex items-center overflow-hidden">
                        <span class="material-icons text-gray-300 text-sm mr-2 group-hover:text-red-500">picture_as_pdf</span>
                        <span class="text-xs text-gray-600 truncate font-medium">DIPA Ditbinmas TA. 2024</span>
                    </div>
                    <span class="material-icons text-gray-300 text-sm">download</span>
                </li>
                <li class="flex items-center justify-between p-2 hover:bg-gray-50 rounded cursor-pointer group">
                    <div class="flex items-center overflow-hidden">
                        <span class="material-icons text-gray-300 text-sm mr-2 group-hover:text-blue-500">description</span>
                        <span class="text-xs text-gray-600 truncate font-medium">Format Laporan Bulanan</span>
                    </div>
                    <span class="material-icons text-gray-300 text-sm">visibility</span>
                </li>
            </ul>
        </div>

    </div>

</div>