@extends('layouts.app')

@section('title', 'Beranda - Ditbinmas Polda NTB')

@section('content')

@php
    $heroTitle = $homeContent->where('section', 'hero')->where('key', 'title')->first()->content ?? 'Mengayomi & Melindungi <br><span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Masyarakat NTB</span>';
    $heroDesc = $homeContent->where('section', 'hero')->where('key', 'content')->first()->content ?? 'Direktorat Binmas Polda NTB berkomitmen membangun kemitraan yang kuat dengan masyarakat untuk menciptakan keamanan dan ketertiban yang kondusif.';
    $heroImage = $homeContent->where('section', 'hero')->where('key', 'image')->first()->image ?? null;

    $sambutanTitle = $homeContent->where('section', 'sambutan')->where('key', 'title')->first()->content ?? 'Mewujudkan Kamtibmas yang <span class="relative text-primary dark:text-accent z-10">Kondusif</span> Melalui Kemitraan.';
    $sambutanContent = $homeContent->where('section', 'sambutan')->where('key', 'content')->first()->content ?? 'Selamat datang di website resmi Ditbinmas Polda NTB...';
    $sambutanImage = $homeContent->where('section', 'sambutan')->where('key', 'image')->first()->image ?? null;
    $sambutanName = $homeContent->where('section', 'sambutan')->where('key', 'name')->first()->content ?? 'Kombes Pol Desy Ismail, S.I.K.';
@endphp

{{-- 1. HERO SECTION (Banner Utama) --}}
<div class="relative bg-gray-900 h-[750px] overflow-hidden group">
    {{-- Background Image & Overlay --}}
    <div class="absolute inset-0">
        <img src="{{ $heroImage ? asset('storage/' . $heroImage) : 'https://source.unsplash.com/1600x900/?police,indonesia' }}" alt="Background" class="w-full h-full object-cover opacity-50 transition-transform duration-[3000ms] group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-transparent"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="w-full md:w-3/4 lg:w-2/3 pt-10">
            {{-- Badge --}}
            <div class="inline-flex items-center gap-2 py-1 px-3 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-white text-xs font-semibold mb-6">
                <span class="w-2 h-2 rounded-full bg-accent animate-pulse"></span>
                Presisi & Humanis
            </div>
            
            {{-- Headline --}}
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 leading-tight drop-shadow-lg">
                {!! $heroTitle !!}
            </h1>
            
            {{-- Deskripsi --}}
            <div class="text-lg text-gray-300 mb-8 leading-relaxed max-w-lg border-l-4 border-accent pl-4">
                {!! $heroDesc !!}
            </div>
            
            {{-- Tombol Aksi --}}
            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <a href="{{ route('profil') }}" class="bg-accent hover:bg-yellow-400 text-primary font-bold py-3.5 px-8 rounded-xl shadow-lg shadow-yellow-500/20 transform transition hover:-translate-y-1 text-center flex items-center justify-center gap-2">
                    Profil Lengkap
                    <span class="material-icons text-sm">arrow_forward</span>
                </a>
                <a href="{{ route('kontak') }}" class="bg-white/10 hover:bg-white/20 border border-white/30 backdrop-blur-sm text-white font-bold py-3.5 px-8 rounded-xl transition text-center flex items-center justify-center gap-2">
                    Hubungi Kami
                </a>
            </div>

            {{-- INFO TERKINI / RUNNING TEXT (Di dalam Hero) --}}
            <div class="w-full max-w-3xl bg-black/40 backdrop-blur-md border border-white/10 rounded-xl p-2 flex items-center gap-3 overflow-hidden">
                <span class="bg-primary text-white font-bold px-3 py-1 rounded-lg text-[10px] uppercase tracking-wider shrink-0 shadow-lg animate-pulse">
                    Info Terkini
                </span>
                <div class="whitespace-nowrap overflow-hidden w-full relative text-gray-200 text-xs font-medium">
                    <div class="animate-marquee inline-block">
                        Selamat Datang di Website Resmi Ditbinmas Polda NTB. | Himbauan: Waspada penipuan online. | Layanan Call Center 110 aktif 24 Jam. | Mari wujudkan NTB Gemilang yang Aman dan Kondusif. | Pendaftaran Satpam Gada Pratama segera dibuka.
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

{{-- 2. PROFILE SECTION / SAMBUTAN (Fix Layout) --}}
<section class="relative py-24 bg-white dark:bg-gray-900 border-b border-gray-100 dark:border-gray-800 overflow-hidden">
    {{-- Background Decoration --}}
    <div class="absolute top-0 right-0 w-1/3 h-full bg-gray-50 dark:bg-gray-800/50 skew-x-12 translate-x-20"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="flex flex-col lg:flex-row items-center gap-12 lg:gap-20">
            
            {{-- KOLOM KIRI: FOTO PIMPINAN --}}
            <div class="w-full lg:w-5/12 flex justify-center lg:justify-end order-1 lg:order-1">
                <div class="relative w-[300px] h-[400px] md:w-[350px] md:h-[450px] group">
                    {{-- Kotak Hiasan Belakang --}}
                    <div class="absolute inset-0 bg-accent rounded-3xl transform translate-x-4 translate-y-4 transition-transform duration-300 group-hover:translate-x-6 group-hover:translate-y-6"></div>
                    
                    {{-- Container Foto --}}
                    <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-700 bg-gray-200">
                        <img src="{{ $sambutanImage ? asset('storage/' . $sambutanImage) : 'https://via.placeholder.com/400x500' }}" alt="Dirbinmas Polda NTB" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                        
                        {{-- Label Nama --}}
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 to-transparent p-6 pt-12">
                            <h4 class="text-white font-bold text-lg leading-tight">{{ $sambutanName }}</h4>
                            <p class="text-accent text-xs font-bold uppercase tracking-widest mt-1">Dirbinmas Polda NTB</p>
                        </div>
                    </div>
                </div>
            </div>
            
            {{-- KOLOM KANAN: TEKS SAMBUTAN --}}
            <div class="w-full lg:w-7/12 order-2 lg:order-2 text-center lg:text-left">
                <div class="inline-flex items-center gap-3 mb-6 bg-blue-50 dark:bg-blue-900/30 px-4 py-2 rounded-full">
                    <span class="w-2 h-2 bg-primary rounded-full animate-ping"></span>
                    <span class="text-primary dark:text-blue-300 font-bold tracking-widest uppercase text-xs">Sambutan Pimpinan</span>
                </div>
                
                <h2 class="text-3xl md:text-5xl font-black text-gray-900 dark:text-white mb-8 leading-tight">
                    {!! $sambutanTitle !!}
                </h2>
                
                <div class="prose prose-lg text-gray-600 dark:text-gray-300 mb-10 leading-relaxed">
                   {!! $sambutanContent !!}
                </div>
                
               <a href="{{ route('sambutan') }}" class="inline-flex items-center gap-3 px-8 py-4 bg-primary text-white font-bold rounded-xl hover:bg-blue-800 transition-all shadow-lg hover:shadow-xl group">
    Baca Sambutan Lengkap 
    <span class="material-icons text-sm group-hover:translate-x-1 transition-transform">arrow_forward</span>
</a>
            </div>

        </div>
    </div>
</section>

{{-- 3. LAYANAN UTAMA --}}
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Layanan Utama</h2>
            <div class="h-1.5 w-24 bg-accent mx-auto mt-4 rounded-full"></div>
            <p class="mt-4 text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">Akses cepat layanan kepolisian dan informasi kemitraan masyarakat.</p>
        </div>
        
        {{-- Grid Menu --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            
            @foreach($services as $service)
            {{-- Item --}}
            <a href="{{ $service->link ?? '#' }}" class="bg-white dark:bg-gray-700 rounded-2xl shadow-lg p-6 border-b-4 border-blue-500 hover:border-accent hover:-translate-y-2 transition-all duration-300 group text-center">
                <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-4 mx-auto group-hover:bg-blue-600 group-hover:text-white transition-colors">
                    <span class="material-icons text-3xl">{{ $service->icon }}</span>
                </div>
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-2">{{ $service->title }}</h3>
                <p class="text-gray-500 text-xs leading-relaxed">{{ $service->description }}</p>
            </a>
            @endforeach
            
        </div>
    </div>
</section>

{{-- 4. STATISTIK ANIMASI (Counter) --}}
<section class="py-20 bg-primary text-white relative overflow-hidden">
    <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center divide-x divide-white/10">
            @foreach($members as $member)
            <div class="p-4 group">
                <div class="text-5xl font-black text-accent mb-2 counter" data-target="{{ $member->count }}">0</div>
                <p class="text-xs uppercase tracking-widest opacity-80 group-hover:text-white transition">{{ $member->name }}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- 5. KILAS BERITA --}}
<section class="py-20 bg-white dark:bg-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
            <div>
                <span class="text-primary font-bold tracking-widest uppercase text-xs">Informasi Terkini</span>
                <h2 class="text-3xl font-black text-gray-800 dark:text-white mt-2 uppercase tracking-tight">Kilas Berita & Giat</h2>
                <div class="w-20 h-1.5 bg-accent mt-4 rounded-full"></div>
            </div>
            <a href="{{ route('berita.index') }}" class="inline-flex items-center gap-2 px-5 py-2 rounded-full border-2 border-gray-200 text-gray-600 text-sm font-bold hover:border-primary hover:text-primary transition-colors">
                Lihat Semua <span class="material-icons text-sm">arrow_forward</span>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            {{-- LOGIKA: Hanya tampilkan jika ada berita --}}
            @if(isset($recentPosts) && $recentPosts->count() > 0)
                @foreach($recentPosts as $item)
                <article class="group bg-gray-50 dark:bg-gray-800 rounded-2xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100 dark:border-gray-700 flex flex-col h-full">
                    <div class="relative h-52 overflow-hidden shrink-0">
                        @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @else
                            <img src="https://source.unsplash.com/800x600/?police,security&sig={{ $loop->iteration }}" alt="Berita" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        @endif
                        
                        <div class="absolute top-4 left-4 bg-white/90 backdrop-blur-sm text-primary text-[10px] font-bold px-3 py-1 rounded-md uppercase tracking-wider shadow-sm">
                            {{ $item->category ?? 'Berita' }}
                        </div>
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center gap-2 text-xs text-gray-400 mb-3">
                            <span class="material-icons text-[14px] text-accent">event</span> 
                            {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('d M Y') }}
                        </div>
                        <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-3 leading-snug group-hover:text-primary transition-colors line-clamp-2">
                            <a href="{{ route('berita.show', $item->slug) }}">
                                {{ $item->title }}
                            </a>
                        </h3>
                        <div class="mt-auto pt-4 border-t border-gray-200 dark:border-gray-700">
                            <a href="{{ route('berita.show', $item->slug) }}" class="inline-flex items-center text-primary font-bold text-xs uppercase tracking-wide hover:underline">
                                Baca Selengkapnya <span class="material-icons text-sm ml-1">arrow_forward</span>
                            </a>
                        </div>
                    </div>
                </article>
                @endforeach
            @else
                <div class="col-span-3 text-center py-10">
                    <p class="text-gray-500 italic">Belum ada berita terbaru.</p>
                </div>
            @endif
        </div>
    </div>
</section>

{{-- 6. GALERI KEGIATAN --}}
<section class="py-20 bg-gray-50 dark:bg-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-gray-800 dark:text-white uppercase">Galeri Kegiatan</h2>
            <p class="text-gray-500 mt-2">Dokumentasi visual kegiatan Ditbinmas di lapangan.</p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-4 grid-rows-2 gap-4 h-[500px]">
            <div class="md:col-span-2 md:row-span-2 relative rounded-2xl overflow-hidden group shadow-lg">
                <img src="https://source.unsplash.com/800x800/?police,officer" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105 filter brightness-75 group-hover:brightness-100">
                <a href="#" class="absolute inset-0 flex items-center justify-center z-10">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-full flex items-center justify-center group-hover:bg-accent transition-colors shadow-xl">
                        <span class="material-icons text-4xl text-white">play_arrow</span>
                    </div>
                </a>
                <div class="absolute bottom-0 left-0 p-6 bg-gradient-to-t from-black/80 to-transparent w-full">
                    <p class="text-white font-bold text-lg">Video Profil Ditbinmas</p>
                    <p class="text-white/70 text-sm">Tonton selengkapnya</p>
                </div>
            </div>
            
            <div class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-transparent transition z-10"></div>
                <img src="https://source.unsplash.com/400x400/?meeting" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-transparent transition z-10"></div>
                <img src="https://source.unsplash.com/400x400/?community" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>
            <div class="md:col-span-2 relative rounded-2xl overflow-hidden group shadow-md">
                <div class="absolute inset-0 bg-black/30 group-hover:bg-transparent transition z-10"></div>
                <img src="https://source.unsplash.com/800x400/?police,team" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
            </div>
        </div>
    </div>
</section>

{{-- 7. PARTNERS / SINERGI --}}
<section class="py-12 bg-white dark:bg-gray-900 border-t border-gray-100 dark:border-gray-800">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <p class="text-center text-xs font-bold text-gray-400 uppercase tracking-widest mb-8">Sinergi Instansi</p>
        <div class="flex flex-wrap justify-center items-center gap-8 md:gap-16 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
            @foreach($partners as $partner)
            <a href="{{ $partner->link ?? '#' }}" target="_blank" title="{{ $partner->name }}">
                <img src="{{ asset('storage/' . $partner->logo) }}" class="h-14 w-auto hover:opacity-100 transition-opacity hover:scale-110 duration-300" alt="{{ $partner->name }}">
            </a>
            @endforeach
            @if($partners->isEmpty())
                <p class="text-xs text-gray-400">Belum ada data sinergi.</p>
            @endif
        </div>
    </div>
</section>

{{-- JAVASCRIPT ANIMASI STATISTIK --}}
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll('.counter');
        const speed = 200; 

        const animateCounters = () => {
            counters.forEach(counter => {
                const updateCount = () => {
                    const target = +counter.getAttribute('data-target');
                    const count = +counter.innerText;
                    const inc = target / speed;

                    if (count < target) {
                        counter.innerText = Math.ceil(count + inc);
                        setTimeout(updateCount, 20);
                    } else {
                        counter.innerText = target;
                    }
                };
                updateCount();
            });
        };

        let hasAnimated = false;
        window.addEventListener('scroll', () => {
            const section = document.querySelector('.counter')?.closest('section');
            if(section) {
                const sectionPos = section.getBoundingClientRect().top;
                const screenPos = window.innerHeight / 1.3;

                if (sectionPos < screenPos && !hasAnimated) {
                    animateCounters();
                    hasAnimated = true;
                }
            }
        });
    });
</script>

{{-- STYLE UNTUK MARQUEE --}}
<style>
    @keyframes marquee {
        0% { transform: translateX(100%); }
        100% { transform: translateX(-100%); }
    }
    .animate-marquee {
        animation: marquee 25s linear infinite;
    }
</style>

@endsection