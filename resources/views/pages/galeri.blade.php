@extends('layouts.app')

@section('title', 'Galeri Kegiatan - Ditbinmas Polda NTB')

@section('content')
<div class="bg-gray-50 dark:bg-gray-900 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Header --}}
        <div class="text-center mb-12">
            <h1 class="text-3xl md:text-5xl font-black text-gray-800 dark:text-white mb-4">Galeri Kegiatan</h1>
            <p class="text-gray-500 dark:text-gray-400 max-w-2xl mx-auto">
                Dokumentasi visual berbagai kegiatan, acara, dan momen penting Direktorat Binmas Polda NTB.
            </p>
            <div class="w-24 h-1.5 bg-accent mx-auto mt-6 rounded-full"></div>
        </div>

        {{-- Grid Galeri --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($galleries as $item)
            <div class="group bg-white dark:bg-gray-800 rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-1">
                {{-- Media --}}
                <div class="relative h-64 overflow-hidden bg-gray-200">
                    @if($item->type === 'video')
                        <div class="absolute inset-0 flex items-center justify-center z-10 pointer-events-none">
                            <div class="w-12 h-12 bg-white/30 backdrop-blur-md rounded-full flex items-center justify-center shadow-lg">
                                <span class="material-icons text-white text-3xl">play_arrow</span>
                            </div>
                        </div>
                        <video src="{{ asset('storage/' . $item->file) }}" class="w-full h-full object-cover"></video>
                    @else
                        <img src="{{ asset('storage/' . $item->file) }}" alt="{{ $item->title }}" class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300"></div>
                    @endif
                </div>

                {{-- Content --}}
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-accent bg-accent/10 px-2 py-1 rounded">
                            {{ $item->type === 'video' ? 'Video' : 'Foto' }}
                        </span>
                        <span class="text-xs text-gray-400 flex items-center gap-1">
                            <span class="material-icons text-[12px]">calendar_today</span>
                            {{ $item->created_at->format('d M Y') }}
                        </span>
                    </div>
                    <h3 class="text-lg font-bold text-gray-800 dark:text-white leading-tight mb-2 group-hover:text-primary transition-colors">
                        {{ $item->title }}
                    </h3>
                    @if($item->description)
                        <p class="text-sm text-gray-500 line-clamp-2">
                            {{ $item->description }}
                        </p>
                    @endif
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-20">
                <div class="inline-block p-6 rounded-full bg-gray-100 dark:bg-gray-800 mb-4">
                    <span class="material-icons text-4xl text-gray-400">collections</span>
                </div>
                <h3 class="text-xl font-bold text-gray-600 dark:text-gray-300">Belum ada galeri.</h3>
                <p class="text-gray-500 mt-2">Silakan kembali lagi nanti untuk melihat dokumentasi kegiatan terbaru.</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-12">
            {{ $galleries->links() }}
        </div>

    </div>
</div>
@endsection
