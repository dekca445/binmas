@extends('layouts.app')

@section('title', 'Beranda - Ditbinmas Polda NTB')

@section('content')
<div class="relative bg-primary overflow-hidden h-[600px]">
    <div class="absolute inset-0">
        <img src="https://source.unsplash.com/1600x900/?police,indonesia" alt="Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/80 to-transparent"></div>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex items-center">
        <div class="md:w-2/3 lg:w-1/2">
            <span class="inline-block py-1 px-3 rounded-full bg-accent/20 border border-accent/50 text-accent text-sm font-semibold mb-4">
                Presisi & Humanis
            </span>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6 leading-tight">
                Mengayomi dan Melindungi <span class="gold-gradient-text">Masyarakat NTB</span>
            </h1>
            <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                Direktorat Binmas Polda NTB berkomitmen membangun kemitraan yang kuat dengan masyarakat untuk menciptakan keamanan dan ketertiban yang kondusif.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="{{ route('profil') }}" class="bg-accent hover:bg-yellow-400 text-primary font-bold py-3 px-8 rounded-lg shadow-lg transform transition hover:-translate-y-1 text-center">
                    Profil Lengkap
                </a>
            </div>
        </div>
    </div>
</div>

<section class="py-16 bg-background-light dark:bg-background-dark">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h2 class="text-primary dark:text-white text-3xl font-bold mb-4">Layanan Utama</h2>
            <div class="h-1 w-20 bg-accent mx-auto rounded-full"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-t-4 border-primary hover:border-accent transition-all duration-300 group hover:-translate-y-2">
                <span class="material-icons text-primary text-4xl mb-4 group-hover:text-accent transition-colors">security</span>
                <h3 class="text-xl font-bold text-primary dark:text-white mb-2">Satpam</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Pembinaan dan sertifikasi kompetensi Satuan Pengamanan.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-t-4 border-primary hover:border-accent transition-all duration-300 group hover:-translate-y-2">
                <span class="material-icons text-primary text-4xl mb-4 group-hover:text-accent transition-colors">groups</span>
                <h3 class="text-xl font-bold text-primary dark:text-white mb-2">Polmas</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Pemolisian Masyarakat yang mengedepankan kemitraan.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 border-t-4 border-primary hover:border-accent transition-all duration-300 group hover:-translate-y-2">
                <span class="material-icons text-primary text-4xl mb-4 group-hover:text-accent transition-colors">school</span>
                <h3 class="text-xl font-bold text-primary dark:text-white mb-2">Binredaks</h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">Penyuluhan dan edukasi pencegahan kenakalan remaja.</p>
            </div>
        </div>
    </div>
</section>
@endsection