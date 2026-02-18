@extends('layouts.app')

@section('title', $post->title . ' - Ditbinmas Polda NTB')

@section('content')

{{-- 1. HERO HEADER (Parallax Effect & Modern Gradient) --}}
<div class="relative w-full h-[75vh] min-h-[500px] group overflow-hidden">
    {{-- Background Image with Slight Zoom Effect --}}
    <div class="absolute inset-0 transition-transform duration-[2000ms] group-hover:scale-105">
        @if($post->thumbnail)
            <img src="{{ asset('storage/' . $post->thumbnail) }}" class="w-full h-full object-cover" alt="{{ $post->title }}">
        @else
            <img src="https://source.unsplash.com/1600x900/?police,meeting" class="w-full h-full object-cover" alt="Default">
        @endif
        {{-- Modern Gradient Overlay: Clear at top, Dark at bottom for text readability --}}
        <div class="absolute inset-0 bg-gradient-to-b from-gray-900/30 via-transparent to-gray-900"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/60 to-transparent"></div>
    </div>

    {{-- Title Content (Bottom Aligned) --}}
    <div class="absolute bottom-0 left-0 w-full p-6 md:p-16 z-20 flex flex-col justify-end h-full">
        <div class="max-w-6xl mx-auto w-full animate-fade-in-up">
            
            {{-- TRUST FEATURE: Category & Verification Badge --}}
            <div class="flex items-center gap-3 mb-6">
                <span class="px-3 py-1 rounded-full bg-blue-600 text-white text-xs font-bold uppercase tracking-widest shadow-lg shadow-blue-900/50">
                    {{ $post->category }}
                </span>
                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full bg-green-500/20 backdrop-blur-md border border-green-500/30 text-green-400 text-xs font-bold uppercase tracking-wide">
                    <span class="material-icons text-[14px]">verified</span> Terverifikasi
                </span>
            </div>
            
            {{-- Headline Typography --}}
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-white leading-tight mb-6 drop-shadow-lg font-serif tracking-tight">
                {{ $post->title }}
            </h1>

            {{-- Meta Data --}}
            <div class="flex flex-wrap items-center gap-6 text-gray-300 text-sm font-medium border-t border-white/10 pt-6">
                {{-- Author Profile --}}
                <div class="flex items-center gap-3">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($post->author) }}&background=0D8ABC&color=fff" class="w-10 h-10 rounded-full border-2 border-white/20 shadow-sm">
                    <div class="flex flex-col">
                        <span class="text-[10px] text-gray-400 uppercase tracking-wider">Penulis</span>
                        <span class="text-white font-bold">{{ $post->author }}</span>
                    </div>
                </div>
                <div class="w-px h-8 bg-white/20 hidden md:block"></div>
                
                {{-- Date --}}
                <div class="flex flex-col">
                    <span class="text-[10px] text-gray-400 uppercase tracking-wider">Tanggal</span>
                    <span class="text-white">{{ $post->created_at->translatedFormat('d F Y') }}</span>
                </div>
                <div class="w-px h-8 bg-white/20 hidden md:block"></div>
                
                {{-- TRUST FEATURE: Estimasi Waktu Baca --}}
                <div class="flex items-center gap-2 bg-white/10 px-3 py-1 rounded-lg backdrop-blur-sm border border-white/10">
                    <span class="material-icons text-sm text-yellow-400">schedule</span>
                    {{-- Logic Estimasi Baca: Jumlah kata / 200 kata per menit --}}
                    <span class="text-xs font-bold text-white">{{ ceil(str_word_count(strip_tags($post->content)) / 200) }} Menit Baca</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- 2. MAIN CONTENT AREA (Floating Card Design) --}}
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-20 relative z-30">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
        {{-- KOLOM KIRI: ISI BERITA (8/12) --}}
        <div class="lg:col-span-8">
            <div class="bg-white rounded-t-3xl md:rounded-3xl shadow-2xl overflow-hidden border border-gray-100">
                
                {{-- TRUST FEATURE: Official Disclaimer --}}
                <div class="bg-blue-50 border-l-4 border-blue-600 p-4 m-8 mb-4 rounded-r-lg flex items-start gap-3">
                    <span class="material-icons text-blue-600 mt-0.5">info</span>
                    <div>
                        <h4 class="text-sm font-bold text-blue-800">Informasi Resmi Ditbinmas Polda NTB</h4>
                        <p class="text-xs text-blue-700 mt-1">Artikel ini telah melalui proses verifikasi oleh Tim Humas. Pastikan menyebarkan informasi yang bersumber dari kanal resmi.</p>
                    </div>
                </div>

                <div class="p-8 md:p-12 pt-4">
                    {{-- Breadcrumb --}}
                    <nav class="flex text-xs font-bold text-gray-400 mb-8 uppercase tracking-wide border-b border-gray-100 pb-4" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-2">
                            <li><a href="{{ route('home') }}" class="hover:text-primary transition">Beranda</a></li>
                            <li>/</li>
                            <li><a href="{{ route('berita.index') }}" class="hover:text-primary transition">Berita</a></li>
                            <li>/</li>
                            <li class="text-gray-800 truncate max-w-[150px] md:max-w-xs">{{ $post->title }}</li>
                        </ol>
                    </nav>

                    {{-- Artikel Body dengan Typography Koran (Serif) --}}
                    <article class="prose prose-lg prose-blue max-w-none text-gray-800 leading-loose font-serif">
                        {{-- Drop Cap Style --}}
                        <div class="first-letter:text-7xl first-letter:font-bold first-letter:text-gray-900 first-letter:float-left first-letter:mr-3 first-letter:mt-[-10px] first-letter:leading-[0.8]">
                            {!! $post->content !!}
                        </div>

                        {{-- Fallback Content (Hapus jika data sudah real) --}}
                        @if(strlen($post->content) < 200)
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos blanditiis tenetur unde suscipit, quam beatae rerum inventore consectetur, neque doloribus, cupiditate numquam sunt ipsa minus ex dicta? Eveniet, enim voluptate.</p>
                            
                            {{-- Blockquote Design --}}
                            @if($post->quote)
                            <blockquote class="border-l-4 border-primary pl-6 italic text-gray-900 font-medium my-10 bg-gray-50 py-6 pr-6 rounded-r-xl relative">
                                <span class="absolute top-2 left-2 text-6xl text-gray-200 font-serif opacity-50 select-none">“</span>
                                "{{ $post->quote }}"
                            </blockquote>
                            @endif
                            
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, nihil.</p>
                        @endif
                    </article>

                    {{-- Author Box (Trust Feature) --}}
                    <div class="mt-12 bg-gray-50 rounded-2xl p-6 border border-gray-100 flex items-center gap-4">
                        <div class="shrink-0">
                            <img src="https://ui-avatars.com/api/?name={{ urlencode($post->author) }}&background=1e40af&color=fff&size=128" class="w-16 h-16 rounded-full ring-4 ring-white">
                        </div>
                        <div>
                            <p class="text-[10px] text-gray-500 uppercase font-bold tracking-wider mb-1">Diterbitkan Oleh</p>
                            <h4 class="font-bold text-gray-900 text-lg">{{ $post->author }}</h4>
                            <p class="text-sm text-gray-600">Tim Humas & Publikasi Direktorat Pembinaan Masyarakat Polda Nusa Tenggara Barat.</p>
                        </div>
                    </div>

                    {{-- Share & Tags --}}
                    <div class="mt-10 pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                        @if($post->tags && is_array($post->tags))
                        <div class="flex flex-wrap gap-2">
                            @foreach($post->tags as $tag)
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-bold uppercase hover:bg-gray-200 transition cursor-pointer">#{{ $tag }}</span>
                            @endforeach
                        </div>
                        @elseif($post->tags && is_string($post->tags))
                         <div class="flex flex-wrap gap-2">
                            @foreach(explode(',', $post->tags) as $tag)
                            <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-bold uppercase hover:bg-gray-200 transition cursor-pointer">#{{ trim($tag) }}</span>
                            @endforeach
                        </div>
                        @else
                        <div class="flex flex-wrap gap-2">
                             <span class="px-3 py-1 bg-gray-100 text-gray-600 rounded-lg text-xs font-bold uppercase hover:bg-gray-200 transition cursor-pointer">#BinmasNTB</span>
                        </div>
                        @endif
                        
                        <div class="flex items-center gap-3">
                            <span class="text-xs font-bold text-gray-400 uppercase tracking-widest">Bagikan Info Ini</span>
                            <button class="w-9 h-9 rounded-full bg-blue-600 text-white flex items-center justify-center hover:bg-blue-700 shadow-md transition transform hover:-translate-y-1"><i class="fab fa-facebook-f"></i></button>
                            <button class="w-9 h-9 rounded-full bg-sky-500 text-white flex items-center justify-center hover:bg-sky-600 shadow-md transition transform hover:-translate-y-1"><i class="fab fa-twitter"></i></button>
                            <button class="w-9 h-9 rounded-full bg-green-500 text-white flex items-center justify-center hover:bg-green-600 shadow-md transition transform hover:-translate-y-1"><i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Navigation Button --}}
            <div class="mt-8">
                <a href="{{ route('berita.index') }}" class="group inline-flex items-center gap-3 text-gray-500 hover:text-primary font-bold transition">
                    <div class="w-10 h-10 rounded-full bg-white shadow-md flex items-center justify-center group-hover:bg-primary group-hover:text-white transition">
                        <span class="material-icons text-sm">arrow_back</span>
                    </div>
                    <span>Kembali ke Daftar Berita</span>
                </a>
            </div>
        </div>

        {{-- KOLOM KANAN: SIDEBAR (4/12) --}}
        <aside class="lg:col-span-4 space-y-8 pt-0 lg:pt-0">
            
            {{-- Widget: Search --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6">
                <h3 class="font-bold text-gray-800 mb-4 text-sm uppercase tracking-wider border-l-4 border-primary pl-3">Cari Informasi</h3>
                <form action="{{ route('berita.index') }}" method="GET">
                    <div class="relative group">
                        <input type="text" name="search" class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 pl-11 text-sm focus:ring-2 focus:ring-primary focus:border-primary outline-none transition group-hover:bg-white" placeholder="Cari berita, himbauan...">
                        <span class="material-icons absolute left-3 top-3 text-gray-400 group-hover:text-primary transition">search</span>
                    </div>
                </form>
            </div>

            {{-- Widget: Berita Terbaru --}}
            <div class="bg-white rounded-2xl shadow-lg border border-gray-100 p-6 sticky top-24">
                <div class="flex items-center justify-between mb-6">
                    <h3 class="font-bold text-gray-800 text-sm uppercase tracking-wider border-l-4 border-primary pl-3">Terkini</h3>
                </div>
                
                <div class="space-y-5">
                    @forelse($recentPosts as $recent)
                    <a href="{{ route('berita.show', $recent->slug) }}" class="group flex gap-4 items-start pb-4 border-b border-gray-50 last:border-0 last:pb-0">
                        <div class="w-20 h-20 shrink-0 overflow-hidden rounded-xl bg-gray-200 relative shadow-sm">
                            @if($recent->thumbnail)
                                <img src="{{ asset('storage/' . $recent->thumbnail) }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @else
                                <img src="https://source.unsplash.com/200x200/?police&sig={{ $recent->id }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <span class="text-[10px] text-primary font-bold uppercase tracking-wider mb-1 block">{{ $recent->category }}</span>
                            <h4 class="text-sm font-bold text-gray-800 leading-snug group-hover:text-primary transition-colors line-clamp-2 mb-2 font-serif">
                                {{ $recent->title }}
                            </h4>
                            <div class="flex items-center gap-1 text-[10px] text-gray-400">
                                <span class="material-icons text-[10px]">schedule</span>
                                {{ $recent->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </a>
                    @empty
                        <div class="text-center py-6">
                            <p class="text-sm text-gray-400 italic">Belum ada berita lain.</p>
                        </div>
                    @endforelse
                </div>

                {{-- WIDGET: CONTACT LINK (Sesuai Request) --}}
                <div class="mt-8 pt-6 border-t border-gray-100 text-center">
                    <span class="material-icons text-4xl text-gray-300 mb-2">contact_support</span>
                    <h4 class="text-gray-900 font-bold text-sm mb-1">Butuh Informasi Lebih Lanjut?</h4>
                    <p class="text-xs text-gray-500 mb-4 px-4">Hubungi kami melalui saluran resmi Ditbinmas Polda NTB.</p>
                    
                    {{-- Tombol Mengarah ke Route 'kontak' --}}
                    <a href="{{ route('kontak') }}" class="block w-full bg-white border-2 border-primary text-primary font-bold py-2.5 rounded-xl hover:bg-primary hover:text-white transition duration-300 text-sm uppercase tracking-wide">
                        Hubungi Kami
                    </a>
                </div>
            </div>

        </aside>

    </div>
</main>
@endsection