@extends('layouts.app')

@section('title', $satker->name . ' - Ditbinmas Polda NTB')

@section('content')

    {{-- 1. HERO HEADER --}}
    <div class="relative bg-primary h-[400px] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://source.unsplash.com/1600x900/?police,office" alt="Background"
                class="w-full h-full object-cover opacity-40">
            <div class="absolute inset-0 bg-gradient-to-b from-primary/90 to-primary/60"></div>
        </div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
            <nav aria-label="Breadcrumb" class="flex mb-4 text-sm text-white/60">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center"><a href="{{ route('home') }}" class="hover:text-white">Beranda</a>
                    </li>
                    <li><span class="material-icons text-base mx-1">chevron_right</span></li>
                    {{-- Link ke Index Satuan Fungsi jika ada, jika tidak, arahkan ke home atau kosongkan --}}
                    <li class="inline-flex items-center"><span class="text-gray-300">Satuan Fungsi</span></li>
                    <li><span class="material-icons text-base mx-1">chevron_right</span></li>
                    <li aria-current="page"><span class="text-white font-semibold">{{ $satker->name }}</span></li>
                </ol>
            </nav>

            <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 tracking-tight uppercase">
                {{ $satker->name }}
            </h1>
            <p class="text-lg md:text-xl text-gray-200 max-w-2xl font-light">
                {{ $satker->deskripsi }}
            </p>
        </div>
    </div>
    {{-- CSS TREE VERTIKAL (Hierarki) --}}
    <style>
        .tf-tree ul {
            display: flex;
            justify-content: center;
            padding-top: 20px;
            position: relative;
        }

        .tf-tree li {
            float: left;
            text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 5px 0 5px;
        }

        /* Garis Konektor Vertikal */
        .tf-tree li::before,
        .tf-tree li::after {
            content: '';
            position: absolute;
            top: 0;
            right: 50%;
            border-top: 2px solid #ccc;
            width: 50%;
            height: 20px;
        }

        .tf-tree li::after {
            right: auto;
            left: 50%;
            border-left: 2px solid #ccc;
        }

        .tf-tree li:only-child::after,
        .tf-tree li:only-child::before {
            display: none;
        }

        .tf-tree li:only-child {
            padding-top: 0;
        }

        .tf-tree li:first-child::before,
        .tf-tree li:last-child::after {
            border: 0 none;
        }

        .tf-tree li:last-child::before {
            border-right: 2px solid #ccc;
            border-radius: 0 5px 0 0;
        }

        .tf-tree li:first-child::after {
            border-radius: 5px 0 0 0;
        }

        .tf-tree ul ul::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            border-left: 2px solid #ccc;
            width: 0;
            height: 20px;
        }

        /* Kartu Jabatan */
        .node-card {
            background: white;
            border: 1px solid #e5e7eb;
            padding: 10px;
            border-radius: 8px;
            display: inline-block;
            min-width: 140px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: all 0.3s;
            z-index: 10;
            position: relative;
        }

        .node-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
            border-color: #0D8ABC;
        }

        .node-img {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin: 0 auto 8px;
            border: 2px solid #f3f4f6;
        }
    </style>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 -mt-16 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI (KONTEN UTAMA) --}}
            <div class="lg:col-span-2 space-y-8">

                {{-- A. TUGAS POKOK --}}
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 p-8">
                    <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                        <span class="material-icons text-primary text-3xl">verified_user</span>
                        <h2 class="text-2xl font-bold text-primary dark:text-white">Tugas Pokok</h2>
                    </div>
                    <div class="prose max-w-none text-gray-600 dark:text-gray-300 leading-relaxed">
                        {!! $satker->tugas_pokok !!}
                        {{-- Menggunakan {!! !!} karena di Filament kita pakai RichEditor --}}
                    </div>
                </div>

                {{-- B. FUNGSI (Looping dari Database JSON) --}}
                @if (!empty($satker->fungsi))
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-100 p-8">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                            <span class="material-icons text-primary text-3xl">engineering</span>
                            <h2 class="text-2xl font-bold text-primary dark:text-white">Fungsi Utama</h2>
                        </div>
                        <ul class="space-y-4">
                            @foreach ($satker->fungsi as $fungsiItem)
                                <li class="flex items-start gap-4 p-3 rounded-lg hover:bg-gray-50 transition">
                                    <span class="material-icons text-green-500 mt-0.5">check_circle</span>
                                    <span class="text-gray-700 dark:text-gray-300 font-medium">{{ $fungsiItem }}</span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- WIDGET AGENDA (Dengan Galeri) --}}
                @if ($agendas->count() > 0)
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 mb-8">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <span class="material-icons text-orange-500 mr-2">event</span> Kegiatan Terbaru
                        </h3>
                        <div class="space-y-6">
                            @foreach ($agendas as $agenda)
                                <div class="border-b border-gray-50 pb-4 last:border-0 last:pb-0">
                                    <div class="flex gap-3 items-start mb-2">
                                        <div
                                            class="bg-orange-50 text-orange-600 rounded p-1 text-center min-w-[50px] shrink-0">
                                            <span
                                                class="block text-xs font-bold">{{ \Carbon\Carbon::parse($agenda->date)->format('d M') }}</span>
                                        </div>
                                        <div>
                                            <p class="text-sm font-bold text-gray-800 leading-tight">{{ $agenda->title }}
                                            </p>
                                            <p class="text-[10px] text-gray-500 mt-1 flex items-center">
                                                <span class="material-icons text-[10px] mr-1">place</span>
                                                {{ $agenda->location }}
                                            </p>
                                        </div>
                                    </div>
                                    {{-- Galeri Kecil --}}
                                    @if (!empty($agenda->gallery))
                                        <div class="grid grid-cols-4 gap-2 mt-2">
                                            @foreach (array_slice($agenda->gallery, 0, 4) as $foto)
                                                <div class="aspect-square rounded-md overflow-hidden bg-gray-100">
                                                    <img src="{{ asset('storage/' . $foto) }}"
                                                        class="w-full h-full object-cover">
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
                {{-- BAGIAN 3: STRUKTUR ORGANISASI (HANYA MUNCUL JIKA ADA DATA) --}}
                @if ($rootOfficial)
                    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mb-8 overflow-hidden">
                        <div class="flex items-center gap-3 mb-6 border-b border-gray-100 pb-4">
                            <span class="material-icons text-primary text-3xl">account_tree</span>
                            <h2 class="text-2xl font-bold text-primary">Struktur Organisasi</h2>
                        </div>

                        <div class="overflow-x-auto pb-8 custom-scrollbar">
                            <div class="tf-tree min-w-max">
                                <ul>
                                    <li>
                                        {{-- LEVEL 1: PIMPINAN --}}
                                        <div class="node-card !bg-primary !border-primary">
                                            <img src="{{ $rootOfficial->image ? asset('storage/' . $rootOfficial->image) : 'https://ui-avatars.com/api/?name=' . urlencode($rootOfficial->name) }}"
                                                class="node-img ring-2 ring-white">
                                            <div class="text-white font-bold text-sm uppercase">
                                                {{ $rootOfficial->position }}</div>
                                            <div class="text-blue-100 text-[10px]">{{ $rootOfficial->name }}</div>
                                        </div>

                                        {{-- LEVEL 2: ANAK BUAH LANGSUNG --}}
                                        @if ($rootOfficial->children->count() > 0)
                                            <ul>
                                                @foreach ($rootOfficial->children as $child)
                                                    <li>
                                                        <div class="node-card">
                                                            <img src="{{ $child->image ? asset('storage/' . $child->image) : 'https://ui-avatars.com/api/?name=' . urlencode($child->name) }}"
                                                                class="node-img">
                                                            <div class="text-gray-800 font-bold text-xs uppercase">
                                                                {{ $child->position }}</div>
                                                            <div class="text-gray-500 text-[10px]">{{ $child->name }}
                                                            </div>
                                                        </div>

                                                        {{-- LEVEL 3: CUCU (BAWAHANNYA BAWAHAN) --}}
                                                        @if ($child->children->count() > 0)
                                                            <ul>
                                                                @foreach ($child->children as $grandChild)
                                                                    <li>
                                                                        <div class="node-card">
                                                                            <div
                                                                                class="text-gray-800 font-bold text-[10px] uppercase">
                                                                                {{ $grandChild->position }}</div>
                                                                            <div class="text-gray-500 text-[9px]">
                                                                                {{ $grandChild->name }}</div>
                                                                        </div>

                                                                        {{-- LEVEL 4: Cicit (Bawahannya Bawahannya Bawahan) --}}
                                                                        @if ($grandChild->children->count() > 0)
                                                                            <ul>
                                                                                @foreach ($grandChild->children as $greatGrandChild)
                                                                                    <li>
                                                                                        <div class="node-card">
                                                                                            <div class="text-gray-800 font-bold text-[9px] uppercase">
                                                                                                {{ $greatGrandChild->position }}</div>
                                                                                            <div class="text-gray-500 text-[8px]">
                                                                                                {{ $greatGrandChild->name }}</div>
                                                                                        </div>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        @endif
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        @endif
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>

            {{-- KOLOM KANAN (SIDEBAR) --}}
            <div class="space-y-8">

                {{-- 1. KARTU PIMPINAN (Otomatis dari Rank 1) --}}
                @if ($pimpinan)
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 text-center relative group">
                        <div class="h-24 bg-gradient-to-r from-primary to-blue-800"></div>
                        <div class="px-6 pb-6 relative">
                            <div class="w-28 h-28 mx-auto -mt-14 rounded-full p-1 bg-white shadow-xl relative z-10">
                                <img src="{{ $pimpinan->image ? asset('storage/' . $pimpinan->image) : 'https://ui-avatars.com/api/?name=' . urlencode($pimpinan->name) . '&background=0D1B3E&color=fff' }}"
                                    class="w-full h-full rounded-full object-cover">
                            </div>
                            <div class="mt-4">
                                <h3 class="text-lg font-bold text-gray-900">{{ $pimpinan->name }}</h3>
                                <p class="text-sm font-semibold text-blue-600 uppercase mt-1">{{ $pimpinan->rank }}</p>
                                <div
                                    class="inline-block bg-gray-100 text-gray-600 text-xs px-3 py-1 rounded-full mt-2 font-medium">
                                    {{ $pimpinan->position }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- 2. DOKUMEN / DOWNLOAD (Dinamis dari Repeater) --}}
                @if (!empty($satker->documents))
                    <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100">
                        <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                            <span class="material-icons text-red-500 mr-2">description</span> Dokumen Penting
                        </h3>
                        <ul class="space-y-2">
                            @foreach ($satker->documents as $doc)
                                <li
                                    class="flex items-center justify-between p-2 hover:bg-gray-50 rounded cursor-pointer group transition">
                                    <div class="flex items-center overflow-hidden mr-2">
                                        <span
                                            class="material-icons text-gray-300 text-sm mr-2 group-hover:text-red-500 transition">picture_as_pdf</span>
                                        <span
                                            class="text-xs text-gray-600 truncate font-medium group-hover:text-primary transition">{{ $doc['title'] ?? 'Dokumen' }}</span>
                                    </div>
                                    <a href="{{ asset('storage/' . $doc['file']) }}" target="_blank"
                                        class="material-icons text-gray-300 text-sm hover:text-blue-600 transition"
                                        title="Download">download</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- 3. KONTAK INFO --}}
                {{-- 3. KONTAK INFO (DINAMIS) --}}
                <div class="bg-primary rounded-xl shadow-lg p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mt-4 -mr-4 w-24 h-24 bg-white/10 rounded-full blur-xl"></div>
                    <h3 class="text-xl font-bold mb-4 relative z-10">Layanan Satker</h3>
                    <div class="space-y-4 relative z-10">
                        <div class="flex items-start gap-3">
                            <div class="bg-white/20 p-2 rounded-lg"><span
                                    class="material-icons text-accent text-sm">call</span></div>
                            <div>
                                <span class="text-xs text-white/60 block">Telepon</span>
                                <span class="font-medium">{{ $satker->phone ?? '(Belum diisi)' }}</span>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <div class="bg-white/20 p-2 rounded-lg"><span
                                    class="material-icons text-accent text-sm">location_on</span></div>
                            <div>
                                <span class="text-xs text-white/60 block">Lokasi</span>
                                <span
                                    class="font-medium text-sm">{{ $satker->location ?? 'Gedung Ditbinmas Polda NTB' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- 4. FAQ (ACCORDION) --}}
                @if (!empty($satker->faq))
                    <div class="bg-white rounded-2xl shadow-lg p-8 border border-gray-100 mt-8">
                        <h3 class="text-xl font-bold text-gray-800 mb-6 flex items-center">
                            <span class="material-icons mr-2 text-purple-600">quiz</span> Tanya Jawab (FAQ)
                        </h3>
                        <div class="space-y-3">
                            @foreach ($satker->faq as $faq)
                                <details class="group bg-gray-50 rounded-lg overflow-hidden border border-gray-200">
                                    <summary
                                        class="flex justify-between items-center font-medium cursor-pointer list-none p-4 hover:bg-white transition">
                                        <span class="text-sm text-gray-800 font-bold">{{ $faq['question'] }}</span>
                                        <span
                                            class="transition group-open:rotate-180 material-icons text-gray-400 text-sm">expand_more</span>
                                    </summary>
                                    <div
                                        class="text-gray-600 text-sm p-4 border-t border-gray-100 bg-white leading-relaxed">
                                        {{ $faq['answer'] }}
                                    </div>
                                </details>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </main>
@endsection
