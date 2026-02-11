@extends('layouts.app')

@section('title', 'Satuan Fungsi - Ditbinmas Polda NTB')

@section('content')
<div class="relative bg-primary h-[400px] overflow-hidden">
    <div class="absolute inset-0">
        <img src="https://source.unsplash.com/1600x900/?security,guard" alt="Background" class="w-full h-full object-cover opacity-40">
        <div class="absolute inset-0 bg-gradient-to-b from-primary/90 to-primary/60"></div>
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
        <nav aria-label="Breadcrumb" class="flex mb-4 text-sm text-white/60">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center"><a href="{{ route('home') }}" class="hover:text-white">Beranda</a></li>
                <li><span class="material-icons text-base mx-1">chevron_right</span></li>
                <li aria-current="page"><span class="text-white font-semibold">Satuan Fungsi</span></li>
            </ol>
        </nav>
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight uppercase">
            {{ request()->segment(2) ?? 'Satuan Fungsi' }}
        </h1>
        <p class="text-lg md:text-xl text-gray-200 max-w-2xl font-light">
            Menjalankan tugas pokok fungsi pembinaan masyarakat secara profesional dan humanis.
        </p>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-16 relative z-10">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 p-8">
                <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                    <span class="material-icons text-primary text-3xl">verified_user</span>
                    <h2 class="text-2xl font-bold text-primary dark:text-white">Tugas Pokok & Fungsi</h2>
                </div>
                <div class="prose max-w-none text-gray-600 dark:text-gray-300">
                    <p class="leading-relaxed mb-4">
                        (Konten ini nantinya akan disesuaikan dengan Satker yang dipilih: Binopsnal, Binpolmas, dll).
                        Secara umum bertugas menyelenggarakan pembinaan masyarakat yang meliputi kegiatan Polmas, ketertiban masyarakat dan kegiatan koordinasi, pengawasan dan pembinaan.
                    </p>
                    <ul class="space-y-3 list-none pl-0">
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-green-500 mt-1 text-sm">check_circle</span>
                            <span>Melakukan pembinaan teknis dan pengawasan.</span>
                        </li>
                        <li class="flex items-start gap-3">
                            <span class="material-icons text-green-500 mt-1 text-sm">check_circle</span>
                            <span>Melaksanakan kegiatan pemberdayaan masyarakat.</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="space-y-8">
            <div class="bg-primary rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
                <h3 class="text-xl font-bold mb-4 relative z-10">Layanan Satker</h3>
                <p class="text-white/80 text-sm mb-6 relative z-10">Butuh koordinasi dengan satuan fungsi ini?</p>
                <div class="space-y-3 relative z-10">
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-accent">call</span>
                        <span class="font-medium">0370 - 1234567</span>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="material-icons text-accent">location_on</span>
                        <span class="font-medium text-sm">Gedung Ditbinmas Lt. 2</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection