@extends('layouts.app')

@section('title', 'Sambutan Dirbinmas - Ditbinmas Polda NTB')

@section('content')

{{-- 1. HERO HEADER --}}
<div class="relative bg-gray-900 py-16 overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-20">
        <img src="https://www.transparenttextures.com/patterns/cubes.png" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-widest uppercase text-xs mb-3 block animate-fade-in-down">Polda Nusa Tenggara Barat</span>
        <h1 class="text-3xl md:text-5xl font-black text-white mb-4 drop-shadow-lg font-serif">
            Sambutan Dirbinmas
        </h1>
        <div class="w-24 h-1 bg-accent mx-auto rounded-full"></div>
    </div>
</div>

{{-- 2. MAIN CONTENT --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-10">
    <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="p-8 md:p-16">
            
            <div class="flex flex-col lg:flex-row gap-16">
                
                {{-- KOLOM KIRI: FOTO PIMPINAN (Style Home Page) --}}
                <div class="w-full lg:w-4/12 flex flex-col items-center lg:items-start">
                    
                    {{-- Container Foto (Persis Home) --}}
                    <div class="relative w-[300px] h-[400px] group mx-auto lg:mx-0">
                        {{-- Kotak Hiasan Belakang --}}
                        <div class="absolute inset-0 bg-accent rounded-3xl transform translate-x-4 translate-y-4 transition-transform duration-300 group-hover:translate-x-6 group-hover:translate-y-6"></div>
                        
                        {{-- Container Gambar --}}
                        <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-700 bg-gray-200">
                            <img src="{{ $imageUrl ? asset('storage/' . $imageUrl) : 'https://via.placeholder.com/400x500' }}" alt="Dirbinmas Polda NTB" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                            
                            {{-- Label Nama Overlay --}}
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 to-transparent p-6 pt-12">
                                <h4 class="text-white font-bold text-lg leading-tight">{{ $sambutanData['name'] ?? 'Nama Pejabat' }}</h4>
                                <p class="text-accent text-xs font-bold uppercase tracking-widest mt-1">Dirbinmas Polda NTB</p>
                            </div>
                        </div>
                    </div>

                    {{-- Fitur Tambahan: Social Media Link --}}
                    <div class="mt-8 w-full max-w-[300px] mx-auto lg:mx-0 text-center lg:text-left">
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-3">Terhubung dengan Pimpinan</p>
                        <div class="flex justify-center lg:justify-start gap-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><span class="material-icons text-sm">link</span></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><span class="material-icons text-sm">share</span></a>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN: TEKS SAMBUTAN --}}
                <div class="w-full lg:w-8/12">
                    
                    {{-- Headline (Style Home) --}}
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white mb-8 leading-tight">
                        {!! $sambutanData['title'] ?? 'Judul Sambutan' !!}
                    </h2>

                    {{-- Isi Teks --}}
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300 text-justify max-w-none">
                        {!! $sambutanData['content'] ?? '<p>Konten sambutan belum tersedia.</p>' !!}
                    </div>

                </div>
            </div>

            {{-- 3. FITUR BARU: FOKUS PRIORITAS (Grid Cards) --}}
            <div class="mt-20 pt-10 border-t border-gray-100 dark:border-gray-700">
                <div class="text-center mb-10">
                    <h3 class="text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Fokus Prioritas Kami</h3>
                    <p class="text-gray-500 mt-2">Pilar utama strategi pembinaan masyarakat Polda NTB.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-2xl border border-blue-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-blue-600 text-3xl">handshake</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Kemitraan Aktif</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Memperkuat sinergi dengan Tokoh Agama, Tokoh Adat, dan Komunitas.</p>
                    </div>

                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-2xl border border-yellow-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-yellow-600 text-3xl">lightbulb</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Problem Solving</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Mengedepankan penyelesaian masalah sosial melalui pendekatan *Restorative Justice*.</p>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-2xl border border-green-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-green-600 text-3xl">verified</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Pam Swakarsa</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Peningkatan kompetensi Satpam dan revitalisasi Satkamling / Pos Ronda.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection