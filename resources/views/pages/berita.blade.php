@extends('layouts.app')

@section('title', 'Berita & Informasi - Ditbinmas Polda NTB')

@section('content')
<header class="relative bg-primary-dark py-12 border-b border-gray-800">
    <div class="absolute inset-0 bg-primary/10"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">Berita & Informasi</h1>
        <p class="text-lg text-gray-400 max-w-2xl">Pusat informasi terkini seputar kegiatan, himbauan kamtibmas, dan pengumuman resmi.</p>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 w-full">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        <div class="lg:col-span-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl p-4 mb-8 shadow-sm border border-gray-200 flex flex-col md:flex-row gap-4 justify-between items-center">
                <div class="relative w-full">
                    <input class="w-full bg-gray-50 border border-gray-300 rounded-lg p-2.5 pl-4" placeholder="Cari berita..." type="text"/>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <article class="flex flex-col bg-white dark:bg-gray-800 rounded-xl shadow-lg border border-gray-100 overflow-hidden hover:border-primary/50 transition-colors group h-full">
                    <div class="h-48 overflow-hidden relative">
                        <div class="absolute top-3 left-3 z-10">
                            <span class="px-2.5 py-1 bg-primary text-xs font-bold text-white uppercase tracking-wide rounded shadow-md">Giat Binmas</span>
                        </div>
                        <img src="https://source.unsplash.com/800x600/?police,meeting" class="w-full h-full object-cover transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6 flex flex-col flex-grow">
                        <div class="flex items-center text-xs text-gray-500 mb-3 space-x-2">
                            <span class="material-icons text-sm text-accent">calendar_today</span>
                            <span>Hari Ini</span>
                        </div>
                        <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3 leading-tight group-hover:text-primary transition-colors">
                            <a href="#">Giat Sambang Desa: Personil Binmas Pantau Situasi Kondusif</a>
                        </h2>
                        <p class="text-gray-600 text-sm line-clamp-3 mb-4 flex-grow">
                            Personil Ditbinmas Polda NTB melakukan kunjungan ke desa binaan untuk memberikan himbauan kamtibmas.
                        </p>
                        <a class="inline-flex items-center text-primary font-semibold text-sm hover:underline mt-auto" href="#">
                            Baca Selengkapnya <span class="material-icons text-sm ml-1">arrow_forward</span>
                        </a>
                    </div>
                </article>
                 </div>
        </div>

        <aside class="lg:col-span-4 space-y-8">
            <div class="bg-gradient-to-br from-primary to-primary-dark rounded-xl shadow-lg p-6 text-center text-white">
                <span class="material-icons text-5xl text-accent mb-3">support_agent</span>
                <h3 class="font-bold text-xl mb-2">Butuh Bantuan?</h3>
                <p class="text-blue-100 text-sm mb-4">Layanan pengaduan dan bantuan darurat 24 jam.</p>
                <a href="tel:110" class="inline-block bg-white text-primary font-bold py-3 px-8 rounded-full shadow hover:bg-gray-50 transition-colors">
                    HUBUNGI 110
                </a>
            </div>
        </aside>
    </div>
</main>
@endsection