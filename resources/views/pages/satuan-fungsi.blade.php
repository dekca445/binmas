@extends('layouts.app')

{{-- Judul Tab Browser Dinamis --}}
@section('title', strtoupper(str_replace('-', ' ', $targetSatker)) . ' - Ditbinmas Polda NTB')

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
            {{ str_replace('-', ' ', $targetSatker) }}
        </h1>
        <p class="text-lg md:text-xl text-gray-200 max-w-2xl font-light">
            Menjalankan tugas pokok fungsi pembinaan masyarakat secara profesional dan humanis.
        </p>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-16 relative z-10">
    
    {{-- LOGIKA PEMANGGILAN FILE ANAK --}}
    @php
        // Hapus tanda strip (-) agar cocok dengan nama file (misal: subdit-binpolmas jadi subditbinpolmas)
        $namaFile = str_replace('-', '', $targetSatker);
    @endphp

    @if(view()->exists('satker.' . $namaFile))
        {{-- Panggil file sesuai nama yang sudah dibersihkan --}}
        @include('satker.' . $namaFile)
    @else
        {{-- Pesan Error jika file benar-benar tidak ada --}}
        <div class="bg-white p-8 rounded-xl shadow-lg text-center border-2 border-dashed border-gray-300">
            <span class="material-icons text-4xl text-gray-300 mb-2">folder_off</span>
            <h3 class="text-xl font-bold text-gray-800">File Tidak Ditemukan</h3>
            <p class="text-gray-500 mb-2">Sistem mencari file: <code>pages/satker/{{ $namaFile }}.blade.php</code></p>
            <span class="text-xs bg-red-100 text-red-600 px-2 py-1 rounded">Pastikan nama file di folder views/pages/satker sudah benar (huruf kecil semua, tanpa spasi/strip)</span>
        </div>
    @endif

</main>
@endsection