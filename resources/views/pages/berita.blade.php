@extends('layouts.app')

@section('title', 'Berita & Informasi - Ditbinmas Polda NTB')

@section('content')

{{-- 1. HERO HEADER (Modern & Immersive) --}}
<header class="relative h-[400px] overflow-hidden group">
    {{-- Background Image --}}
    <div class="absolute inset-0">
        <img src="https://source.unsplash.com/1600x900/?newspaper,broadcast" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105" alt="News Background">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-blue-900/40"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center z-10">
        {{-- Breadcrumb --}}
        <nav class="flex items-center gap-2 text-sm text-gray-300 mb-4 animate-fade-in-down">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span class="material-icons text-xs">chevron_right</span>
            <span class="text-yellow-400 font-bold">Berita & Informasi</span>
        </nav>

        <h1 class="text-4xl md:text-6xl font-black text-white mb-4 tracking-tight drop-shadow-lg">
            Kabar <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Presisi</span>
        </h1>
        <p class="text-lg text-gray-300 max-w-2xl leading-relaxed">
            Update terkini kegiatan Ditbinmas, informasi Kamtibmas, dan agenda kepolisian di wilayah Nusa Tenggara Barat.
        </p>
    </div>
</header>

{{-- 2. SEARCH & FILTER SECTION (Floating) --}}
<div class="relative -mt-10 z-20 px-4">
    <div class="max-w-5xl mx-auto bg-white rounded-2xl shadow-xl border border-gray-100 p-3">
        <form action="{{ route('berita.index') }}" method="GET" class="flex flex-col md:flex-row gap-3">
            
            {{-- Filter Kategori --}}
            <div class="md:w-1/4 relative border-b md:border-b-0 md:border-r border-gray-200">
                <span class="absolute left-3 top-3.5 material-icons text-gray-400">category</span>
                <select name="kategori" class="w-full pl-10 pr-4 py-3 bg-transparent outline-none text-gray-700 font-medium appearance-none cursor-pointer focus:bg-gray-50 rounded-xl transition">
                    <option value="">Semua Kategori</option>
                    <option value="Giat Binmas" {{ request('kategori') == 'Giat Binmas' ? 'selected' : '' }}>Giat Binmas</option>
                    <option value="Himbauan" {{ request('kategori') == 'Himbauan' ? 'selected' : '' }}>Himbauan</option>
                    <option value="Satpam" {{ request('kategori') == 'Satpam' ? 'selected' : '' }}>Satpam & Polsus</option>
                </select>
            </div>

            {{-- Input Pencarian --}}
            <div class="md:w-3/4 relative">
                <span class="absolute left-3 top-3.5 material-icons text-gray-400">search</span>
                <input type="text" name="search" value="{{ request('search') }}" 
                       class="w-full pl-10 pr-4 py-3 bg-transparent outline-none text-gray-700 placeholder-gray-400 focus:bg-gray-50 rounded-xl transition" 
                       placeholder="Cari judul berita, kegiatan, atau topik...">
            </div>

            {{-- Tombol Cari --}}
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold px-8 py-3 rounded-xl transition shadow-lg hover:shadow-blue-500/30 flex items-center justify-center gap-2">
                Cari <span class="material-icons text-sm">arrow_forward</span>
            </button>
        </form>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        {{-- KOLOM KIRI: LIST BERITA (8/12) --}}
        <div class="lg:col-span-8 space-y-10">
            
            {{-- GRID BERITA --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                @forelse($posts as $post)
                <article class="group flex flex-col bg-white rounded-3xl shadow-sm hover:shadow-2xl border border-gray-100 overflow-hidden transition-all duration-300 h-full hover:-translate-y-1">
                    
                    {{-- Gambar --}}
                    <div class="h-60 overflow-hidden relative">
                        {{-- Badge Kategori --}}
                        <div class="absolute top-4 left-4 z-10">
                            <span class="px-3 py-1.5 bg-white/90 backdrop-blur-md text-blue-800 text-[10px] font-bold uppercase tracking-widest rounded-lg shadow-sm">
                                {{ $post->kategori }}
                            </span>
                        </div>

                        {{-- Link Wrapper Gambar --}}
                        <a href="{{ route('berita.show', $post->slug ?? '#') }}" class="block h-full">
                            @if($post->gambar)
                                <img src="{{ asset('storage/' . $post->gambar) }}" alt="{{ $post->judul }}" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            @else
                                <img src="https://source.unsplash.com/800x600/?police,security&sig={{ $post->id }}" alt="Default" class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700">
                            @endif
                            {{-- Overlay Gradient --}}
                            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    </div>
                    
                    {{-- Konten --}}
                    <div class="p-7 flex flex-col flex-grow">
                        {{-- Metadata --}}
                        <div class="flex items-center gap-3 text-xs text-gray-400 mb-4 font-medium">
                            <span class="flex items-center gap-1">
                                <span class="material-icons text-[14px] text-yellow-500">calendar_month</span>
                                {{ $post->created_at->format('d M Y') }}
                            </span>
                            <span class="w-1 h-1 bg-gray-300 rounded-full"></span>
                            <span class="flex items-center gap-1">
                                <span class="material-icons text-[14px] text-blue-500">person</span>
                                {{ $post->penulis }}
                            </span>
                        </div>

                        {{-- Judul --}}
                        <h2 class="text-xl font-bold text-gray-800 mb-3 leading-snug group-hover:text-blue-700 transition-colors line-clamp-2">
                            <a href="{{ route('berita.show', $post->slug ?? '#') }}">
                                {{ $post->judul }}
                            </a>
                        </h2>

                        {{-- Ringkasan --}}
                        <p class="text-gray-500 text-sm line-clamp-3 mb-6 leading-relaxed flex-grow">
                            {{ $post->ringkasan }}
                        </p>

                        {{-- Tombol Baca --}}
                        <div class="pt-5 border-t border-gray-100 flex items-center justify-between">
                            <a href="{{ route('berita.show', $post->slug ?? '#') }}" class="inline-flex items-center text-blue-600 font-bold text-xs uppercase tracking-wide group-hover:underline">
                                Baca Lengkap <span class="material-icons text-sm ml-1 transition-transform group-hover:translate-x-1">arrow_forward</span>
                            </a>
                            <span class="text-[10px] text-gray-400 font-medium flex items-center gap-1">
                                <span class="material-icons text-[10px]">visibility</span> {{ $post->views }}
                            </span>
                        </div>
                    </div>
                </article>
                @empty
                    <div class="col-span-1 md:col-span-2 py-16 text-center">
                        <div class="bg-gray-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                            <span class="material-icons text-4xl text-gray-300">search_off</span>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Tidak ada berita ditemukan</h3>
                        <p class="text-gray-500 text-sm">Coba gunakan kata kunci lain atau reset filter.</p>
                        <a href="{{ route('berita.index') }}" class="inline-block mt-4 text-blue-600 font-bold text-sm hover:underline">Reset Pencarian</a>
                    </div>
                @endforelse
            </div>

            {{-- PAGINATION --}}
            <div class="mt-12">
                {{ $posts->links() }}
            </div>
        </div>

        {{-- KOLOM KANAN: SIDEBAR (4/12) --}}
        <aside class="lg:col-span-4 space-y-10">
            
            {{-- Widget 1: Berita Populer (Ranking Style) --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-6 bg-red-500 rounded-full"></div>
                    <h3 class="font-bold text-gray-800 text-lg uppercase tracking-tight">Sedang Trending</h3>
                </div>
                
                <div class="space-y-5">
                    @foreach($populer as $index => $pop)
                    <a href="{{ route('berita.show', $pop->slug ?? '#') }}" class="flex gap-4 group items-start">
                        <span class="text-3xl font-black text-gray-200 group-hover:text-red-500 transition-colors leading-none -mt-1">
                            0{{ $loop->iteration }}
                        </span>
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 leading-snug group-hover:text-blue-700 transition-colors line-clamp-2">
                                {{ $pop->judul }}
                            </h4>
                            <span class="text-[10px] text-gray-400 mt-1 block">
                                {{ $pop->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </a>
                    @endforeach
                </div>
            </div>

            {{-- Widget 2: Kategori List --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-6 bg-blue-600 rounded-full"></div>
                    <h3 class="font-bold text-gray-800 text-lg uppercase tracking-tight">Kategori</h3>
                </div>
                
                <nav class="space-y-1">
                    @php $kategoris = ['Giat Binmas', 'Himbauan', 'Satpam & Polsus', 'Bhabinkamtibmas', 'Edukasi']; @endphp
                    @foreach($kategoris as $cat)
                    <a href="/berita?kategori={{ $cat }}" class="flex justify-between items-center px-3 py-2 rounded-lg text-gray-600 hover:bg-blue-50 hover:text-blue-700 transition group">
                        <span class="text-sm font-medium">{{ $cat }}</span>
                        <span class="material-icons text-xs text-gray-300 group-hover:text-blue-500">arrow_forward_ios</span>
                    </a>
                    @endforeach
                </nav>
            </div>

            {{-- Widget 3: Tags Cloud (Fitur Baru) --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-1 h-6 bg-yellow-500 rounded-full"></div>
                    <h3 class="font-bold text-gray-800 text-lg uppercase tracking-tight">Topik Populer</h3>
                </div>
                <div class="flex flex-wrap gap-2">
                    @php $tags = ['Narkoba', 'Lalu Lintas', 'Pos Kamling', 'Jumat Curhat', 'Vaksinasi', 'Hoax', 'Pilurada']; @endphp
                    @foreach($tags as $tag)
                        <a href="/berita?search={{ $tag }}" class="px-3 py-1 bg-gray-100 text-gray-600 text-xs font-bold rounded-full hover:bg-blue-600 hover:text-white transition">
                            #{{ $tag }}
                        </a>
                    @endforeach
                </div>
            </div>

            {{-- Widget 4: Newsletter (Fitur Baru) --}}
            <div class="bg-gradient-to-br from-blue-900 to-blue-700 rounded-2xl shadow-xl p-6 text-center text-white relative overflow-hidden">
                <div class="absolute top-0 right-0 w-24 h-24 bg-white opacity-10 rounded-full -mr-10 -mt-10"></div>
                <span class="material-icons text-4xl mb-3 block opacity-80">mark_email_unread</span>
                <h3 class="font-bold text-lg mb-2">Berlangganan Info</h3>
                <p class="text-blue-100 text-xs mb-4">Dapatkan update berita Kamtibmas terbaru langsung ke email Anda.</p>
                <form action="#" class="space-y-2">
                    <input type="email" class="w-full px-4 py-2 rounded-lg text-gray-800 text-sm focus:ring-2 focus:ring-yellow-400 outline-none" placeholder="Email Anda...">
                    <button type="button" class="w-full bg-yellow-400 hover:bg-yellow-500 text-blue-900 font-bold py-2 rounded-lg text-sm transition">
                        Langganan
                    </button>
                </form>
            </div>

        </aside>
    </div>
</main>
@endsection