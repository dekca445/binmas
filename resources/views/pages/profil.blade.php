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

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 min-h-screen">
        
        {{-- TAB NAVIGATION --}}
        <div class="flex flex-wrap justify-center gap-4 mb-16 sticky top-24 z-30 py-4 bg-white/80 dark:bg-gray-900/80 backdrop-blur shadow-sm rounded-2xl border border-gray-100 dark:border-gray-800">
            <button onclick="switchTab('sejarah')" id="tab-sejarah" 
                class="tab-btn px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-primary text-white shadow-lg shadow-blue-500/30">
                Sejarah
            </button>
            <button onclick="switchTab('visi-misi')" id="tab-visi-misi" 
                class="tab-btn px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-white text-gray-600 hover:bg-gray-50 border border-gray-200">
                Visi & Misi
            </button>
            <button onclick="switchTab('struktur')" id="tab-struktur" 
                class="tab-btn px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-white text-gray-600 hover:bg-gray-50 border border-gray-200">
                Struktur Organisasi
            </button>
            <button onclick="switchTab('akuntabilitas')" id="tab-akuntabilitas" 
                class="tab-btn px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-white text-gray-600 hover:bg-gray-50 border border-gray-200">
                Akuntabilitas
            </button>
             <button onclick="switchTab('satwil')" id="tab-satwil" 
                class="tab-btn px-6 py-2.5 rounded-xl font-bold text-sm transition-all duration-300 bg-white text-gray-600 hover:bg-gray-50 border border-gray-200">
                Satuan Wilayah
            </button>
        </div>

        {{-- TAB CONTENT: SEJARAH --}}
        <div id="content-sejarah" class="tab-content block animate-fade-in-up">
            <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-8 md:p-12 shadow-2xl shadow-blue-900/5 border border-white/50 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-64 h-64 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
                
                <h2 class="text-3xl font-black text-primary dark:text-white mb-8 border-l-8 border-accent pl-6">Sejarah Singkat</h2>
                <div class="prose prose-lg prose-blue dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 leading-relaxed text-justify">
                    {!! $profileData['sejarah'] ?? '<p>Konten sejarah belum tersedia.</p>' !!}
                </div>
            </div>
        </div>

        {{-- TAB CONTENT: VISI & MISI --}}
        <div id="content-visi-misi" class="tab-content hidden animate-fade-in-up">
            <div class="grid md:grid-cols-2 gap-12">
                {{-- VISI --}}
                <div class="bg-gradient-to-br from-primary to-blue-800 rounded-[2.5rem] p-10 text-white relative overflow-hidden shadow-2xl transform hover:scale-[1.02] transition-transform duration-500">
                    <div class="absolute top-0 right-0 p-8 opacity-10"><span class="material-icons text-9xl">visibility</span></div>
                    <div class="relative z-10 h-full flex flex-col">
                        <h2 class="text-3xl font-black mb-6 flex items-center gap-3">
                            <span class="bg-white/20 p-2 rounded-lg"><span class="material-icons">flag</span></span>
                            Visi
                        </h2>
                        <div class="prose prose-invert max-w-none text-blue-50 text-lg leading-relaxed flex-grow">
                             {!! $profileData['visi'] ?? '<p>Visi belum tersedia.</p>' !!}
                        </div>
                    </div>
                </div>

                {{-- MISI --}}
                <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] p-10 border border-gray-100 dark:border-gray-700 shadow-2xl relative overflow-hidden h-full">
                    <div class="absolute bottom-0 left-0 w-full h-2 bg-gradient-to-r from-accent to-yellow-500"></div>
                    <h2 class="text-3xl font-black text-gray-800 dark:text-white mb-8 flex items-center gap-3">
                        <span class="bg-orange-100 text-orange-600 p-2 rounded-lg"><span class="material-icons">track_changes</span></span>
                        Misi
                    </h2>
                    <div class="prose prose-blue dark:prose-invert max-w-none text-gray-600 dark:text-gray-300 space-y-4">
                         {!! $profileData['misi'] ?? '<p>Misi belum tersedia.</p>' !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- TAB CONTENT: STRUKTUR --}}
        <div id="content-struktur" class="tab-content hidden animate-fade-in-up">
             <style>
                .tf-tree ul { display: flex; justify-content: center; padding-top: 20px; position: relative; }
                .tf-tree li { float: left; text-align: center; list-style-type: none; position: relative; padding: 20px 5px 0 5px; }
                .tf-tree li::before, .tf-tree li::after { content: ''; position: absolute; top: 0; right: 50%; border-top: 2px solid #ccc; width: 50%; height: 20px; }
                .tf-tree li::after { right: auto; left: 50%; border-left: 2px solid #ccc; }
                .tf-tree li:only-child::after, .tf-tree li:only-child::before { display: none; }
                .tf-tree li:only-child { padding-top: 0; }
                .tf-tree li:first-child::before, .tf-tree li:last-child::after { border: 0 none; }
                .tf-tree li:last-child::before { border-right: 2px solid #ccc; border-radius: 0 5px 0 0; }
                .tf-tree li:first-child::after { border-radius: 5px 0 0 0; }
                .tf-tree ul ul::before { content: ''; position: absolute; top: 0; left: 50%; border-left: 2px solid #ccc; width: 0; height: 20px; }
                .node-card { background: white; border: 1px solid #e5e7eb; padding: 10px; border-radius: 8px; display: inline-block; min-width: 140px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); transition: all 0.3s; z-index: 10; position: relative; }
                .node-card:hover { transform: translateY(-5px); box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1); border-color: #0D8ABC; }
                .node-img { width: 60px; height: 60px; border-radius: 50%; object-fit: cover; margin: 0 auto 8px; border: 2px solid #f3f4f6; }
            </style>

            <section class="bg-gray-50 dark:bg-gray-900 rounded-[3rem] p-8 overflow-hidden overflow-x-auto min-h-[600px]">
                 <div class="relative w-full min-w-max pb-10 mx-auto">
                    <div class="tf-tree">
                        <ul>
                            @foreach($structureRoots as $root)
                            <li>
                                <div class="node-card !bg-primary !border-primary">
                                    <img src="{{ $root->image ? asset('storage/' . $root->image) : 'https://ui-avatars.com/api/?name=' . urlencode($root->name) . '&background=0D1B3E&color=fff' }}" class="node-img ring-2 ring-white">
                                    <div class="text-white font-bold text-sm uppercase">{{ $root->position }}</div>
                                    <div class="text-blue-100 text-[10px]">{{ $root->name }}</div>
                                </div>
                                @if($root->children->count() > 0)
                                    <ul>
                                        @foreach($root->children as $child)
                                            <li>
                                                <div class="node-card">
                                                    <img src="{{ $child->image ? asset('storage/' . $child->image) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}" class="node-img">
                                                    <div class="text-gray-800 font-bold text-xs uppercase">{{ $child->position }}</div>
                                                    <div class="text-gray-500 text-[10px]">{{ $child->name }}</div>
                                                </div>
                                                @if($child->children->count() > 0)
                                                    <ul>
                                                        @foreach($child->children as $grandChild)
                                                            <li>
                                                                <div class="node-card">
                                                                    <div class="text-gray-800 font-bold text-[10px] uppercase">{{ $grandChild->position }}</div>
                                                                    <div class="text-gray-500 text-[9px]">{{ $grandChild->name }}</div>
                                                                </div>
                                                                @if($grandChild->children->count() > 0)
                                                                    <ul>
                                                                        @foreach($grandChild->children as $greatGrandChild)
                                                                            <li>
                                                                                <div class="node-card">
                                                                                    <div class="text-gray-800 font-bold text-[9px] uppercase">{{ $greatGrandChild->position }}</div>
                                                                                    <div class="text-gray-500 text-[8px]">{{ $greatGrandChild->name }}</div>
                                                                                </div>
                                                                            </li>
                                                                        @endforeach
                                                                    </ul>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>
                 </div>
            </section>
        </div>

        {{-- TAB CONTENT: AKUNTABILITAS --}}
        <div id="content-akuntabilitas" class="tab-content hidden animate-fade-in-up">
            <div class="bg-gray-50 dark:bg-gray-900 rounded-[3rem] p-10">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse ($documents as $category => $docs)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-xl overflow-hidden border border-gray-100 dark:border-gray-700 hover:shadow-2xl transition duration-300">
                            <div class="bg-primary/5 p-4 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center">
                                <h4 class="font-bold text-lg text-primary dark:text-accent">{{ $category }}</h4>
                                <span class="bg-primary text-white text-xs font-bold px-2 py-1 rounded-md">{{ $docs->count() }} Dokumen</span>
                            </div>
                            <div class="p-6">
                                <ul class="space-y-4">
                                    @foreach ($docs as $doc)
                                        <li class="flex items-start gap-3 group">
                                            <div class="bg-red-100 text-red-600 rounded-lg p-2 shrink-0 group-hover:bg-red-600 group-hover:text-white transition">
                                                <span class="material-icons text-xl">picture_as_pdf</span>
                                            </div>
                                            <div>
                                                <a href="{{ asset('storage/' . $doc->file_path) }}" target="_blank" class="font-medium text-gray-800 dark:text-white hover:text-primary transition line-clamp-2">
                                                    {{ $doc->title }}
                                                </a>
                                                <p class="text-xs text-gray-500 mt-1">{{ $doc->created_at->format('d M Y') }}</p>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-3 text-center py-10">
                            <p class="text-gray-500">Belum ada dokumen akuntabilitas yang diunggah.</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- TAB CONTENT: SATWIL --}}
        <div id="content-satwil" class="tab-content hidden animate-fade-in-up">
            <section class="py-12 bg-white dark:bg-gray-900 relative overflow-hidden rounded-[3rem] border border-gray-100 shadow-xl">
                {{-- Dekorasi Background --}}
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-600/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2 pointer-events-none"></div>
    
                <div class="relative z-10 px-8">
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
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-blue-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polresta Mataram</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-blue-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Lombok Barat</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-blue-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Lombok Tengah</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-blue-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Lombok Timur</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-blue-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-blue-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Lombok Utara</a></li>
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
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-green-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Sumbawa</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-green-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Sumbawa Barat</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-green-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Dompu</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-green-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Bima</a></li>
                                    <li><a href="#" class="flex items-center p-3 rounded-xl bg-gray-50 hover:bg-green-600 hover:text-white transition group/item"><span class="w-2 h-2 bg-green-500 rounded-full mr-3 group-hover/item:bg-white"></span> Polres Bima Kota</a></li>
                                </ul>
                            </div>
                        </div>
        
                        {{-- KOLOM KANAN: PETA VISUAL --}}
                        <div class="lg:col-span-5 h-full">
                            <div class="relative group h-full">
                                <div class="absolute inset-0 bg-gradient-to-tr from-blue-600/30 to-green-500/30 rounded-[2.5rem] rotate-3 blur-md transform transition-transform duration-500 group-hover:rotate-6"></div>
                                <div class="relative bg-white dark:bg-gray-800 p-3 rounded-[2.5rem] shadow-2xl border border-white/50 h-full overflow-hidden">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/6/67/Locator_map_of_West_Nusa_Tenggara_Province%2C_Indonesia.svg/1200px-Locator_map_of_West_Nusa_Tenggara_Province%2C_Indonesia.svg.png" 
                                         alt="Peta Wilayah Hukum Polda NTB" 
                                         class="w-full h-full object-cover rounded-[2rem] filter contrast-110">
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
        </div>

    </main>

    {{-- SCRIPT: TAB SWITCHER --}}
    <script>
        function switchTab(tabId) {
            // Hide all
            document.querySelectorAll('.tab-content').forEach(el => {
                el.classList.add('hidden');
                el.classList.remove('block');
            });
            // Show selected
            document.getElementById('content-' + tabId).classList.remove('hidden');
            document.getElementById('content-' + tabId).classList.add('block');

            // Update Buttons
            document.querySelectorAll('.tab-btn').forEach(btn => {
                btn.classList.remove('bg-primary', 'text-white', 'shadow-lg', 'shadow-blue-500/30');
                btn.classList.add('bg-white', 'text-gray-600', 'hover:bg-gray-50');
            });
            const activeBtn = document.getElementById('tab-' + tabId);
            activeBtn.classList.remove('bg-white', 'text-gray-600', 'hover:bg-gray-50');
            activeBtn.classList.add('bg-primary', 'text-white', 'shadow-lg', 'shadow-blue-500/30');
        }
    </script>
@endsection