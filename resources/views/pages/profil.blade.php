@extends('layouts.app')

@section('title', 'Profil - Ditbinmas Polda NTB')

@section('content')

    {{-- HERO SECTION --}}
    <section class="relative bg-gray-900 py-20 overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://source.unsplash.com/1600x900/?police,indonesia" alt="Background" class="w-full h-full object-cover opacity-30">
            <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/90 to-transparent"></div>
        </div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-12">
            <div class="max-w-3xl">
                <div class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-white text-xs font-semibold mb-6">
                    <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                    Tentang Kami
                </div>
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">
                    Profil <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Ditbinmas</span>
                </h1>
                <p class="text-gray-300 text-lg leading-relaxed max-w-2xl border-l-4 border-accent pl-6">
                    Mendukung Transformasi Polri yang <strong class="text-white">Presisi</strong> dalam mewujudkan keamanan dan ketertiban masyarakat
                    melalui kemitraan proaktif di wilayah hukum Nusa Tenggara Barat.
                </p>
            </div>
            <div class="hidden lg:block opacity-20 transform rotate-12 pointer-events-none">
                <img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Lambang_Polri.png" alt="Logo Binmas" class="h-64 w-auto drop-shadow-2xl grayscale invert">
            </div>
        </div>
    </section>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 space-y-24">
        
        {{-- SEJARAH & VISI MISI --}}
        <section class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16">
            <div class="lg:col-span-7 space-y-8">
                <div class="flex items-center gap-4 mb-2">
                    <div class="h-1.5 w-16 bg-accent rounded-full"></div>
                    <h2 class="text-3xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Sejarah Singkat</h2>
                </div>
                <div class="prose prose-lg text-gray-600 dark:text-gray-300 text-justify leading-loose">
                    <p>
                        Direktorat Pembinaan Masyarakat (Ditbinmas) Polda NTB merupakan unsur pelaksana tugas pokok pada
                        tingkat Polda yang berkedudukan di bawah Kapolda. Berawal dari fungsi bimbingan masyarakat
                        konvensional, Ditbinmas telah bertransformasi menjadi garda terdepan dalam fungsi <strong class="text-primary dark:text-accent">Pre-emtif</strong>
                        kepolisian di Nusa Tenggara Barat.
                    </p>
                    <p>
                        Dalam perjalanannya, Ditbinmas terus beradaptasi dengan dinamika sosial budaya masyarakat <strong class="text-primary dark:text-accent">Sasak,
                        Samawa, dan Mbojo</strong>. Fokus utama evolusinya adalah penguatan strategi <em>Community Policing</em> (Polmas)
                        untuk membangun daya cegah masyarakat terhadap potensi gangguan Kamtibmas.
                    </p>
                </div>
            </div>

            <div class="lg:col-span-5">
                <div class="bg-gradient-to-br from-white to-gray-50 dark:from-gray-800 dark:to-gray-900 rounded-3xl shadow-2xl border border-gray-100 dark:border-gray-700 p-8 relative overflow-hidden h-full group">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-accent/10 rounded-bl-[4rem] transition-transform group-hover:scale-110"></div>
                    <div class="relative z-10 space-y-10">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                                <span class="material-icons text-primary">visibility</span> Visi
                            </h3>
                            <p class="text-gray-600 dark:text-gray-300 italic pl-4 border-l-2 border-accent">
                                "Terwujudnya kemitraan Polri dengan masyarakat yang erat dan sinergis guna menciptakan situasi Kamtibmas yang kondusif."
                            </p>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4 flex items-center gap-3">
                                <span class="material-icons text-primary">rocket_launch</span> Misi Utama
                            </h3>
                            <ul class="space-y-4">
                                <li class="flex items-start gap-3">
                                    <span class="material-icons text-accent text-sm mt-1">check_circle</span>
                                    <span class="text-gray-600 dark:text-gray-300 text-sm font-medium">Mengembangkan strategi Polmas berbasis kearifan lokal.</span>
                                </li>
                                <li class="flex items-start gap-3">
                                    <span class="material-icons text-accent text-sm mt-1">check_circle</span>
                                    <span class="text-gray-600 dark:text-gray-300 text-sm font-medium">Meningkatkan kualitas koordinasi pengamanan swakarsa.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- DIVIDER --}}
        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
            <span class="flex-shrink-0 mx-4 text-gray-300"><span class="material-icons">security</span></span>
            <div class="flex-grow border-t border-gray-200 dark:border-gray-700"></div>
        </div>

        {{-- STRUKTUR ORGANISASI --}}
        <section class="py-16 bg-gray-50 dark:bg-gray-900 rounded-[3rem] overflow-hidden">
            {{-- Tambahkan class 'relative' di sini agar garis absolute tidak lari ke header --}}
            <div class="relative w-full">

                {{-- Judul --}}
                <div class="flex flex-col items-center mb-12 text-center">
                    <h2 class="text-3xl font-black text-primary dark:text-white uppercase tracking-tighter">Struktur Organisasi</h2>
                    <p class="text-accent font-bold text-xs tracking-[0.3em] uppercase mt-2">Ditbinmas Polda NTB</p>
                    <div class="w-24 h-1 bg-accent mt-3 rounded-full"></div>
                </div>

                {{-- Container Chart --}}
                <div class="flex flex-col items-center w-full">

                    {{-- LEVEL 1: PIMPINAN --}}
                    <div class="flex flex-col items-center z-10 relative">
                        {{-- DIRBINMAS --}}
                        <a href="{{ url('satker/dirbinmas') }}"
                            class="group relative bg-primary text-white border-b-4 border-accent py-3 px-2 w-64 text-center shadow-2xl rounded-2xl hover:scale-105 transition-all duration-300">
                            <h3 class="font-black text-base uppercase tracking-widest">DIRBINMAS</h3>
                            <p class="text-[10px] text-accent font-extrabold mt-1 uppercase">Kombes Pol Desy Ismail, S.I.K.</p>
                        </a>

                        <div class="w-1 h-8 bg-primary dark:bg-white"></div>

                        {{-- WADIR --}}
                        <a href="{{ url('satker/wadir') }}"
                            class="group relative bg-primary text-white border-b-4 border-accent py-2 px-2 w-56 text-center shadow-xl rounded-xl hover:scale-105 transition-all duration-300">
                            <h3 class="font-bold text-sm uppercase tracking-widest">WADIR</h3>
                            <p class="text-[9px] text-accent font-bold mt-0.5 uppercase">Akbp (Nama Wadir), S.I.K.</p>
                        </a>

                        <div class="w-1 h-8 bg-primary dark:bg-white"></div>
                    </div>

                    {{-- LEVEL 2: BAGIAN & SUBBAG --}}
                    <div class="relative flex flex-col items-center mb-16 w-full max-w-5xl">
                        {{-- Garis Horizontal Level 2 --}}
                        <div class="absolute top-0 left-[28.5%] right-[28.5%] h-1 bg-primary dark:bg-white"></div>

                        <div class="flex justify-center gap-10 md:gap-24 relative w-full px-4">
                            
                            {{-- BAGBINOPSNAL --}}
                            <div class="flex flex-col items-center">
                                <div class="w-1 h-6 bg-primary dark:bg-white"></div>
                                <a href="{{ url('satker/bagbinopsnal') }}"
                                    class="bg-white dark:bg-gray-800 border-2 border-primary py-2 px-1 w-44 text-center rounded-lg shadow-lg hover:bg-primary group transition-all">
                                    <h4 class="font-bold text-primary dark:text-white group-hover:text-white text-[10px] tracking-wider uppercase">Bagbinopsnal</h4>
                                    <p class="text-[8px] text-gray-500 font-bold mt-0.5 group-hover:text-yellow-300 uppercase">AKBP (NAMA), S.H.</p>
                                </a>

                                <div class="w-1 h-4 bg-primary dark:bg-white"></div>

                                {{-- Anak Bagbinopsnal --}}
                                <div class="relative flex justify-center gap-2">
                                    <div class="absolute top-0 left-2 right-2 h-0.5 bg-primary dark:bg-white"></div>
                                    <div class="pt-2 flex flex-col items-center">
                                        <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                        <div class="bg-gray-100 p-1 text-[7px] w-20 text-center font-bold border border-gray-300 rounded uppercase">MINOPSNAL</div>
                                    </div>
                                    <div class="pt-2 flex flex-col items-center">
                                        <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                        <div class="bg-gray-100 p-1 text-[7px] w-20 text-center font-bold border border-gray-300 rounded uppercase">ANEV</div>
                                    </div>
                                </div>
                            </div>

                            {{-- SUBBAGRENMIN --}}
                            <div class="flex flex-col items-center">
                                <div class="w-1 h-6 bg-primary dark:bg-white"></div>
                                <a href="{{ url('satker/subbagrenmin') }}"
                                    class="bg-white dark:bg-gray-800 border-2 border-primary py-2 px-1 w-44 text-center rounded-lg shadow-lg hover:bg-primary group transition-all">
                                    <h4 class="font-bold text-primary dark:text-white group-hover:text-white text-[10px] tracking-wider uppercase">Subbagrenmin</h4>
                                    <p class="text-[8px] text-gray-500 font-bold mt-0.5 group-hover:text-yellow-300 uppercase">Penata TK I (NAMA)</p>
                                </a>

                                <div class="w-1 h-4 bg-primary dark:bg-white"></div>

                                {{-- Anak Renmin --}}
                                <div class="relative flex justify-center gap-1">
                                    <div class="absolute top-0 left-2 right-2 h-0.5 bg-primary dark:bg-white"></div>
                                    <div class="pt-2 flex flex-col items-center">
                                        <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                        <div class="bg-gray-100 p-1 text-[6px] w-12 text-center font-bold border border-gray-300 rounded uppercase">URREN</div>
                                    </div>
                                    <div class="pt-2 flex flex-col items-center">
                                        <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                        <div class="bg-gray-100 p-1 text-[6px] w-12 text-center font-bold border border-gray-300 rounded uppercase">URMINTU</div>
                                    </div>
                                    <div class="pt-2 flex flex-col items-center">
                                        <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                        <div class="bg-gray-100 p-1 text-[6px] w-12 text-center font-bold border border-gray-300 rounded uppercase">URKEU</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- GARIS PENGHUBUNG PANJANG KE BAWAH --}}
                    {{-- Perbaikan: Garis ini sekarang relatif terhadap wrapper utamanya, tidak akan lari ke header --}}
                    <div class="absolute top-[290px] left-1/2 -translate-x-1/2 w-1 h-[225px] bg-primary dark:bg-white z-0 hidden lg:block"></div>

                    {{-- LEVEL 3: PARA SUBDIT (Grid 4 Kolom) --}}
                    <div class="relative w-full max-w-7xl mt-4 px-2">
                        {{-- Garis Horizontal Panjang --}}
                        <div class="absolute top-0 left-[3%] right-[3%] h-1 bg-primary dark:bg-white hidden lg:block"></div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 pt-0 lg:pt-0 justify-items-center">
                            @php
                                $subdits = [
                                    ['id' => 'subditbintibsos', 'title' => 'SUBDIT BINTIBSOS', 'name' => 'AKBP (NAMA)', 'units' => ['BINTURMAS', 'BINPENAKTA']],
                                    ['id' => 'subditbinsatpam', 'title' => 'SUBDIT BINSATPAM', 'name' => 'AKBP (NAMA)', 'units' => ['BINLAT', 'WASJASPAM', 'KORWAS']],
                                    ['id' => 'subditbinpolmas', 'title' => 'SUBDIT BINPOLMAS', 'name' => 'AKBP (NAMA)', 'units' => ['BINORSOS', 'BINKOMMAS']],
                                    ['id' => 'subditbhabinkamtibmas', 'title' => 'SUBDIT BHABIN', 'name' => 'AKBP (NAMA)', 'units' => ['LATPUAN', 'BINEV']],
                                ];
                            @endphp

                            @foreach ($subdits as $sub)
                                <div class="flex flex-col items-center w-full relative">
                                    {{-- Garis konektor vertikal kecil (hanya muncul di desktop) --}}
                                    <div class="w-1 h-6 bg-primary dark:bg-white hidden lg:block"></div>
                                    
                                    {{-- Kotak Subdit --}}
                                    <a href="{{ url('satker/' . $sub['id']) }}"
                                        class="group bg-white border-2 border-primary py-3 px-1 w-full max-w-[220px] text-center shadow-md rounded-lg hover:bg-primary transition-all duration-300 z-10">
                                        <h5 class="font-black text-primary group-hover:text-white text-[10px] sm:text-xs mb-0.5 tracking-tight uppercase transition-colors">
                                            {{ $sub['title'] }}</h5>
                                        <p class="text-[8px] text-accent font-bold group-hover:text-yellow-300 uppercase transition-colors">
                                            {{ $sub['name'] }}</p>
                                    </a>

                                    <div class="w-1 h-4 bg-primary dark:bg-white"></div>

                                    {{-- Unit Bawah --}}
                                    <div class="relative flex justify-center gap-1 w-full max-w-[220px]">
                                        @php
                                            $unitCount = count($sub['units']);
                                            $inset = $unitCount > 1 ? "15%" : '50%'; 
                                        @endphp

                                        @if($unitCount > 1)
                                            <div class="absolute top-0 h-0.5 bg-primary dark:bg-white z-0" style="left: {{ $inset }}; right: {{ $inset }};"></div>
                                        @endif

                                        @foreach ($sub['units'] as $unit)
                                            <div class="flex flex-col items-center pt-2 relative w-full">
                                                <div class="w-0.5 h-2 bg-primary dark:bg-white absolute top-0"></div>
                                                <div class="bg-gray-50 px-1 py-1 text-[7px] w-full text-center border border-gray-300 font-bold text-gray-600 rounded leading-tight uppercase z-10 hover:bg-gray-200">
                                                    {{ $unit }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    {{-- MAKLUMAT PELAYANAN & ZONA INTEGRITAS --}}
    <section class="py-20 bg-white dark:bg-gray-900">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="relative rounded-[3rem] p-10 md:p-16 overflow-hidden shadow-2xl text-center group">
                
                {{-- Background Gradient & Pattern --}}
                <div class="absolute inset-0 bg-gradient-to-br from-blue-900 via-blue-800 to-blue-900 transition-colors duration-500"></div>
                <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/diamond-upholstery.png')]"></div>
                
                {{-- Decorative Circle --}}
                <div class="absolute -top-24 -right-24 w-64 h-64 bg-yellow-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse"></div>
                <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-blue-400 rounded-full mix-blend-overlay filter blur-3xl opacity-20 animate-pulse"></div>

                <div class="relative z-10">
                    <div class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-md border border-white/20 text-yellow-300 px-5 py-1.5 rounded-full font-bold text-xs uppercase tracking-widest mb-8 shadow-lg">
                        <span class="material-icons text-sm">verified_user</span> Komitmen Integritas
                    </div>

                    <h2 class="text-4xl md:text-5xl font-black text-white mb-8 font-serif tracking-tight drop-shadow-md">
                        MAKLUMAT PELAYANAN
                    </h2>

                    <div class="max-w-4xl mx-auto relative">
                        <span class="absolute -top-4 -left-4 text-6xl text-yellow-400/20 font-serif">“</span>
                        <p class="text-lg md:text-2xl leading-relaxed text-blue-50 font-light italic px-6 md:px-12 border-l-4 border-yellow-400">
                            "Dengan ini kami menyatakan sanggup menyelenggarakan pelayanan sesuai standar pelayanan yang telah ditetapkan, dan apabila tidak menepati janji ini, kami siap menerima sanksi sesuai peraturan perundang-undangan yang berlaku."
                        </p>
                        <span class="absolute -bottom-8 -right-4 text-6xl text-yellow-400/20 font-serif">”</span>
                    </div>

                    <div class="mt-16 pt-8 border-t border-white/10 flex flex-col md:flex-row justify-center items-center gap-10">
                        {{-- Badges --}}
                        <div class="flex gap-6">
                            <div class="bg-white p-3 rounded-xl shadow-lg transform hover:scale-110 transition-transform duration-300" title="Wilayah Bebas Korupsi">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/9/9c/Logo_Presisi_Polri.png" class="h-14 w-auto" alt="Presisi">
                            </div>
                            <div class="bg-white p-3 rounded-xl shadow-lg transform hover:scale-110 transition-transform duration-300" title="Zona Integritas">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/2/29/Lambang_Polri.png" class="h-14 w-auto" alt="Polri">
                            </div>
                        </div>

                        {{-- Tanda Tangan --}}
                        <div class="text-left">
                            <p class="text-[10px] text-blue-300 uppercase tracking-[0.2em] font-bold mb-1">Direktur Pembinaan Masyarakat</p>
                            <p class="text-xl font-bold text-white">Kombes Pol Desy Ismail, S.I.K.</p>
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Signature_sample.svg/1200px-Signature_sample.svg.png" class="h-12 opacity-80 mt-2 filter invert brightness-200">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- DOKUMEN TRANSPARANSI (RENSTRA/LAKIP) --}}
    <section class="py-20 bg-gray-50 dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12">
                <div>
                    <h2 class="text-3xl font-black text-gray-800 dark:text-white uppercase tracking-tighter">Akuntabilitas Kinerja</h2>
                    <div class="h-1.5 w-20 bg-primary mt-3 rounded-full"></div>
                    <p class="text-gray-500 mt-4 max-w-lg">Dokumen publik terkait perencanaan dan laporan kinerja Ditbinmas sebagai wujud transparansi anggaran.</p>
                </div>
                <a href="#" class="group inline-flex items-center gap-2 text-primary font-bold text-sm hover:text-blue-700 transition-colors mt-6 md:mt-0">
                    Lihat Arsip Lengkap 
                    <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                {{-- Dokumen 1 --}}
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-red-100 text-red-600 text-[10px] font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">PDF</div>
                    <div class="w-14 h-14 bg-red-50 text-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-red-600 group-hover:text-white transition-colors">
                        <span class="material-icons text-3xl">menu_book</span>
                    </div>
                    <h4 class="font-bold text-gray-800 dark:text-white text-lg mb-2">Renstra Ditbinmas</h4>
                    <p class="text-gray-500 text-xs mb-8 leading-relaxed">Rencana Strategis jangka menengah (5 Tahun) periode 2020-2024.</p>
                    <button class="w-full py-3 border-2 border-red-100 text-red-600 font-bold rounded-xl text-sm hover:bg-red-600 hover:border-red-600 hover:text-white transition-all flex items-center justify-center gap-2">
                        <span class="material-icons text-sm">download</span> Unduh Dokumen
                    </button>
                </div>

                {{-- Dokumen 2 --}}
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-blue-100 text-blue-600 text-[10px] font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">PDF</div>
                    <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                        <span class="material-icons text-3xl">analytics</span>
                    </div>
                    <h4 class="font-bold text-gray-800 dark:text-white text-lg mb-2">LAKIP 2024</h4>
                    <p class="text-gray-500 text-xs mb-8 leading-relaxed">Laporan Akuntabilitas Kinerja Instansi Pemerintah Tahun Anggaran 2024.</p>
                    <button class="w-full py-3 border-2 border-blue-100 text-blue-600 font-bold rounded-xl text-sm hover:bg-blue-600 hover:border-blue-600 hover:text-white transition-all flex items-center justify-center gap-2">
                        <span class="material-icons text-sm">download</span> Unduh Dokumen
                    </button>
                </div>

                {{-- Dokumen 3 --}}
                <div class="group bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 dark:border-gray-700 transition-all duration-300 hover:-translate-y-2 relative overflow-hidden">
                    <div class="absolute top-0 right-0 bg-green-100 text-green-600 text-[10px] font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">PDF</div>
                    <div class="w-14 h-14 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                        <span class="material-icons text-3xl">account_balance</span>
                    </div>
                    <h4 class="font-bold text-gray-800 dark:text-white text-lg mb-2">DIPA T.A. 2025</h4>
                    <p class="text-gray-500 text-xs mb-8 leading-relaxed">Daftar Isian Pelaksanaan Anggaran Ditbinmas Tahun 2025.</p>
                    <button class="w-full py-3 border-2 border-green-100 text-green-600 font-bold rounded-xl text-sm hover:bg-green-600 hover:border-green-600 hover:text-white transition-all flex items-center justify-center gap-2">
                        <span class="material-icons text-sm">download</span> Unduh Dokumen
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- WILAYAH HUKUM / JAJARAN --}}
    <section class="py-24 bg-white dark:bg-gray-900 relative overflow-hidden">
        {{-- Dekorasi Background --}}
        <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            {{-- Header Section --}}
            <div class="text-center md:text-left mb-12">
                <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 text-xs font-bold uppercase tracking-widest mb-3">
                    <span class="w-2 h-2 rounded-full bg-blue-600 animate-pulse"></span> Jangkauan Tugas
                </div>
                <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white tracking-tight">Wilayah Hukum Polda NTB</h2>
                <p class="text-gray-500 mt-2 max-w-2xl">Membina fungsi teknis Binmas pada <strong>10 Satuan Wilayah</strong> yang tersebar di dua pulau utama.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-start">
                
                {{-- KOLOM KIRI: DAFTAR POLRES (7 Kolom) --}}
                <div class="lg:col-span-7 grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Card Pulau Lombok --}}
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-blue-100 dark:border-gray-700 hover:border-blue-500 transition-all duration-300">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-blue-50 text-blue-600 flex items-center justify-center">
                                    <span class="material-icons">water_drop</span>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white text-lg">Pulau Lombok</h4>
                            </div>
                            <span class="px-2 py-1 bg-blue-100 text-blue-700 text-xs font-bold rounded-md">5 Satwil</span>
                        </div>
                        
                        <ul class="space-y-2">
                            <li>
                                <a href="https://www.google.com/maps/search/Polresta+Mataram" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition group/item">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polresta Mataram</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Lombok+Barat" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition group/item">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Lombok Barat</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Lombok+Tengah" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition group/item">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Lombok Tengah</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Lombok+Timur" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition group/item">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Lombok Timur</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Lombok+Utara" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-blue-600 hover:text-white dark:hover:bg-blue-600 transition group/item">
                                    <span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Lombok Utara</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    {{-- Card Pulau Sumbawa --}}
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl p-6 shadow-lg border border-green-100 dark:border-gray-700 hover:border-green-500 transition-all duration-300">
                        <div class="flex items-center justify-between mb-6">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-green-50 text-green-600 flex items-center justify-center">
                                    <span class="material-icons">terrain</span>
                                </div>
                                <h4 class="font-bold text-gray-800 dark:text-white text-lg">Pulau Sumbawa</h4>
                            </div>
                            <span class="px-2 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md">5 Satwil</span>
                        </div>
                        
                        <ul class="space-y-2">
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Sumbawa" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-green-600 hover:text-white dark:hover:bg-green-600 transition group/item">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Sumbawa</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Sumbawa+Barat" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-green-600 hover:text-white dark:hover:bg-green-600 transition group/item">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Sumbawa Barat</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Dompu" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-green-600 hover:text-white dark:hover:bg-green-600 transition group/item">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Dompu</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Bima" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-green-600 hover:text-white dark:hover:bg-green-600 transition group/item">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Bima</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.google.com/maps/search/Polres+Bima+Kota" target="_blank" class="flex items-center p-3 rounded-xl bg-gray-50 dark:bg-gray-700/50 hover:bg-green-600 hover:text-white dark:hover:bg-green-600 transition group/item">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white transition-colors"></span>
                                    <span class="text-sm font-medium">Polres Bima Kota</span>
                                    <span class="material-icons text-xs opacity-0 group-hover/item:opacity-100 ml-auto transition-opacity">open_in_new</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                {{-- KOLOM KANAN: PETA VISUAL (5 Kolom) --}}
                <div class="lg:col-span-5 h-full">
                    <div class="relative group h-full">
                        {{-- Efek Glow di belakang --}}
                        <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/30 to-green-500/30 rounded-[2.5rem] rotate-3 blur-md transform transition-transform duration-500 group-hover:rotate-6"></div>
                        
                        {{-- Container Peta --}}
                        <div class="relative bg-white dark:bg-gray-800 p-3 rounded-[2.5rem] shadow-2xl border border-white/50 h-full overflow-hidden">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Locator_map_of_West_Nusa_Tenggara_Province%2C_Indonesia.svg/1200px-Locator_map_of_West_Nusa_Tenggara_Province%2C_Indonesia.svg.png" 
                                 alt="Peta Wilayah Hukum Polda NTB" 
                                 class="w-full h-full object-cover rounded-[2rem] filter contrast-110">
                            
                            {{-- Overlay Info Floating --}}
                            <div class="absolute top-6 left-6 right-6">
                                <div class="bg-white/90 backdrop-blur-sm p-4 rounded-2xl shadow-lg border border-white/50 flex items-start gap-4">
                                    <div class="bg-blue-600/10 p-2.5 rounded-xl text-blue-600">
                                        <span class="material-icons text-2xl">map</span>
                                    </div>
                                    <div>
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider">Luas Wilayah Hukum</p>
                                        <p class="text-sm font-bold text-gray-800 leading-snug mt-1">Provinsi Nusa Tenggara Barat</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Tombol Aksi Bawah --}}
                            <div class="absolute bottom-6 left-6 right-6">
                                <a href="https://www.google.com/maps/place/Polda+Nusa+Tenggara+Barat" target="_blank" class="flex items-center justify-center gap-2 w-full bg-blue-900 hover:bg-blue-800 text-white font-bold py-3.5 rounded-xl shadow-lg transition-all hover:shadow-blue-900/50 group/btn">
                                    <span class="material-icons text-sm group-hover/btn:animate-bounce">near_me</span>
                                    Buka Peta Digital
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    </main>
@endsection