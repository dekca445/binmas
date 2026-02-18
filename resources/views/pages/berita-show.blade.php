@extends('layouts.app')

@section('content')
<div class="py-12 bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 max-w-4xl">
        
        <a href="{{ route('berita.index') }}" class="inline-flex items-center text-gray-600 hover:text-blue-600 mb-6 transition-colors">
            <span class="material-icons text-sm mr-2">arrow_back</span>
            Kembali ke Berita
        </a>

        <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <div class="w-full h-64 md:h-96 relative">
                <img src="{{ $post->thumbnail ? asset('storage/' . $post->thumbnail) : 'https://placehold.co/800x600?text=No+Image' }}" 
                     alt="{{ $post->title }}" 
                     class="w-full h-full object-cover">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 p-6 md:p-10 text-white">
                    <span class="bg-blue-600 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider mb-3 inline-block">
                        {{ $post->category }}
                    </span>
                    <h1 class="text-3xl md:text-4xl font-bold leading-tight mb-2">
                        {{ $post->title }}
                    </h1>
                    <div class="flex items-center text-sm text-gray-200 space-x-4">
                        <span class="flex items-center">
                            <span class="material-icons text-sm mr-1">calendar_today</span>
                            {{ $post->created_at->format('d M Y') }}
                        </span>
                        <span class="flex items-center">
                            <span class="material-icons text-sm mr-1">schedule</span>
                            {{ $post->created_at->format('H:i') }} WIB
                        </span>
                    </div>
                </div>
            </div>

            <div class="p-6 md:p-10 text-gray-800 leading-relaxed text-lg">
                <div class="prose prose-lg max-w-none prose-blue">
                    {!! $post->content !!}
                </div>
            </div>
        </article>

    </div>
</div>
@endsection