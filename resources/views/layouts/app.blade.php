<!DOCTYPE html>
<html lang="id" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Ditbinmas Polda NTB')</title>

    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />

    <script>
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    colors: {
                        "primary": "#0D1B3E",
                        "primary-dark": "#060D1F",
                        "accent": "#FFD700",
                        "accent-gold": "#C5A059",
                        "background-light": "#F8F9FA",
                        "background-dark": "#0B1221",
                    },
                    fontFamily: {
                        "display": ["Inter", "sans-serif"]
                    },
                },
            },
        }
    </script>

    <style>
        .gold-gradient-text {
            background: linear-gradient(to right, #BF953F, #FCF6BA, #B38728, #FBF5B7, #AA771C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            font-weight: bold;
        }
        .blue-gradient-bg {
            background: linear-gradient(135deg, #0D1B3E 0%, #060D1F 100%);
        }
    </style>
    <style>
    /* Mencegah seleksi teks (tidak bisa diblok/copy) */
    body {
        -webkit-user-select: none; /* Safari */
        -ms-user-select: none; /* IE 10+ */
        user-select: none; /* Standard */
    }

    /* Proteksi Gambar: Mencegah pointer-events agar tidak bisa di-klik kanan khusus gambar */
    img {
        -webkit-user-drag: none;
        user-select: none;
        pointer-events: none;
    }

    /* Trik CSS: Menyembunyikan konten saat layar di-print (mencegah Print Screen ke PDF) */
    @media print {
        body { display: none !important; }
    }
</style>
<style>
    /* Lapisan pelindung di atas semua gambar berita */
    .img-container {
        position: relative;
        display: inline-block;
    }
    
    .img-container::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0); /* Transparan penuh */
        z-index: 10;
    }
</style>
<style>
    /* Mencegah seleksi teks di seluruh website */
    body {
        -webkit-user-select: none;  /* Safari */
        -moz-user-select: none;     /* Firefox */
        -ms-user-select: none;      /* IE/Edge */
        user-select: none;          /* Standar */
    }

    /* Kecuali untuk input form agar masyarakat tetap bisa mengetik pesan aduan */
    input, textarea {
        -webkit-user-select: text;
        -moz-user-select: text;
        -ms-user-select: text;
        user-select: text;
    }
</style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200 antialiased flex flex-col min-h-screen">

    <nav class="sticky top-0 z-50 bg-primary dark:bg-primary-dark shadow-lg border-b-4 border-accent relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                
                {{-- KIRI: Logo & Judul --}}
                <div class="flex items-center space-x-3">
                    <div class="flex-shrink-0">
                        <div class="h-12 w-12 sm:h-16 sm:w-16 flex items-center justify-center">
                            <img src="{{ asset('images/logo-binmas.png') }}" alt="Logo Binmas"
                                class="h-full w-full object-contain p-1">
                        </div>
                    </div>
                    <div class="block"> 
                        <h1 class="text-white font-bold text-sm sm:text-lg leading-tight tracking-wide">DITBINMAS POLDA NTB</h1>
                        <p class="text-accent text-xs font-medium tracking-wider uppercase hidden sm:block mt-0.5">Direktorat Pembinaan Masyarakat</p>
                    </div>
                </div>

                {{-- TENGAH: Menu Desktop --}}
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-6">
                        <a href="{{ route('home') }}"
                            class="{{ request()->routeIs('home') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-semibold transition-colors">Beranda</a>
                        <a href="{{ route('profil') }}"
                            class="{{ request()->routeIs('profil') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-medium transition-colors">Profil</a>

                        <div class="relative group">
                            <button
                                class="text-gray-300 group-hover:text-white px-3 py-2 text-sm font-medium inline-flex items-center transition-colors">
                                Satuan Fungsi <span class="material-icons text-sm ml-1">expand_more</span>
                            </button>

                            <div
                                class="absolute left-0 mt-2 w-64 bg-white rounded-md shadow-lg py-2 hidden group-hover:block z-50 animate-fade-in-down border-t-4 border-accent">
                                @php
                                    $satkers = \App\Models\Satker::all();
                                @endphp

                                @foreach ($satkers as $menuSatker)
                                    <a href="{{ route('satker.show', $menuSatker->slug) }}"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 hover:text-primary border-b border-gray-50 last:border-0 uppercase">
                                        {{ $menuSatker->name }}
                                    </a>
                                @endforeach

                                @if ($satkers->isEmpty())
                                    <span class="block px-4 py-2 text-xs text-gray-400 italic">Belum ada data Satker</span>
                                @endif
                            </div>
                        </div>

                        <a href="{{ route('berita.index') }}"
                            class="{{ request()->routeIs('berita.index') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-medium transition-colors">
                            Berita
                        </a>

                        <a href="{{ route('kontak') }}"
                            class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-medium transition-colors">
                            Kontak
                        </a>
                    </div>
                </div>

                {{-- KANAN: Tombol Lapor Desktop --}}
                <div class="hidden md:flex items-center space-x-4">
                    <a href="#"
                        class="bg-accent hover:bg-yellow-400 text-primary font-bold py-2 px-4 rounded shadow-md transition-colors text-sm">
                        Lapor Polisi
                    </a>
                </div>

                {{-- TOMBOL HAMBURGER MOBILE --}}
                <div class="-mr-2 flex md:hidden">
                    <button type="button" id="mobile-menu-btn"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-primary/50 focus:outline-none transition-colors"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Buka menu utama</span>
                        <span class="material-icons text-2xl" id="mobile-menu-icon">menu</span>
                    </button>
                </div>

            </div>
        </div>

        {{-- PERUBAHAN DI SINI: bg-primary-dark/85 dan backdrop-blur-md ditambahkan --}}
        <div class="md:hidden hidden absolute top-full left-0 w-full bg-primary-dark/85 backdrop-blur-md shadow-2xl border-b-4 border-accent transition-all duration-300 ease-in-out z-50" id="mobile-menu">
            <div class="px-4 pt-4 pb-6 space-y-2 max-h-[80vh] overflow-y-auto">
                <a href="{{ route('home') }}" class="text-white block px-3 py-2 rounded-md text-base font-medium">Beranda</a>
                <a href="{{ route('profil') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Profil</a>
                
                {{-- Dropdown Mobile Satker --}}
                <div>
                    <button id="mobile-satker-btn" class="w-full text-left text-gray-300 hover:text-white px-3 py-2 rounded-md text-base font-medium flex justify-between items-center">
                        Satuan Fungsi <span class="material-icons transition-transform duration-200" id="mobile-satker-icon">expand_more</span>
                    </button>
                    {{-- PERUBAHAN DI SINI: Menyesuaikan transparansi submenu agar senada (bg-white/10) --}}
                    <div class="hidden px-4 py-2 space-y-2 bg-white/10 rounded-lg mt-1" id="mobile-satker-menu">
                        @foreach ($satkers as $menuSatker)
                            <a href="{{ route('satker.show', $menuSatker->slug) }}" class="block px-3 py-2 text-sm text-gray-300 hover:text-white uppercase border-b border-gray-700/50 last:border-0">
                                {{ $menuSatker->name }}
                            </a>
                        @endforeach
                    </div>
                </div>

                <a href="{{ route('berita.index') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Berita</a>
                <a href="{{ route('kontak') }}" class="text-gray-300 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Kontak</a>
                
                <div class="pt-4 border-t border-gray-700/50">
                    <a href="#" class="block w-full text-center bg-accent hover:bg-yellow-400 text-primary font-bold py-3 px-4 rounded shadow-md transition-colors text-base mt-2">
                        Lapor Polisi
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="flex-grow">
        @yield('content')
    </main>

    <footer class="bg-background-dark text-white pt-16 pb-8 border-t-8 border-accent mt-auto">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-4 mb-4">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('images/logo-binmas.png') }}" alt="Logo Binmas"
                                class="h-12 w-auto object-contain">
                        </div>
                        <span class="font-bold text-xl tracking-wider text-white">DITBINMAS POLDA NTB</span>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-sm">
                        Mewujudkan keamanan yang kondusif untuk masyarakat produktif. Melayani dengan hati nurani,
                        melindungi dengan presisi.
                    </p>
                </div>
                <div>
                    <h4 class="font-bold text-lg mb-4 text-accent">Kontak</h4>
                    <ul class="text-sm text-gray-400 space-y-2">
                        <li class="flex items-start gap-2"><span class="material-icons text-xs mt-1">location_on</span>
                            Jl. Langko No. 77, Mataram</li>
                        <li class="flex items-center gap-2"><span class="material-icons text-xs">phone</span> (0370)
                            621123</li>
                    </ul>
                </div>
            </div>
            <div class="border-t border-gray-800 pt-8 text-center text-xs text-gray-500">
                <p>&copy; {{ date('Y') }} Ditbinmas Polda NTB. Hak Cipta Dilindungi Undang-Undang.</p>
            </div>
        </div>
    </footer>

    {{-- Script Interaksi Mobile Menu --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Logika Buka/Tutup Menu Utama Mobile
            const mobileMenuBtn = document.getElementById('mobile-menu-btn');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuIcon = document.getElementById('mobile-menu-icon');

            mobileMenuBtn.addEventListener('click', () => {
                mobileMenu.classList.toggle('hidden');
                // Ganti ikon menu jadi silang (close) saat terbuka
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenuIcon.textContent = 'menu';
                } else {
                    mobileMenuIcon.textContent = 'close';
                }
            });

            // Logika Dropdown Satker di Mobile
            const satkerBtn = document.getElementById('mobile-satker-btn');
            const satkerMenu = document.getElementById('mobile-satker-menu');
            const satkerIcon = document.getElementById('mobile-satker-icon');

            satkerBtn.addEventListener('click', () => {
                satkerMenu.classList.toggle('hidden');
                // Putar ikon panah ke atas saat dropdown terbuka
                satkerIcon.classList.toggle('rotate-180');
            });
        });
    </script>

    <script>
    // 1. Matikan Klik Kanan (Mencegah Inspect Element & Save Image)
    document.addEventListener('contextmenu', function(e) {
        e.preventDefault();
    });

    // 2. Matikan Shortcut Keyboard (F12, Ctrl+Shift+I, Ctrl+U, Ctrl+S)
    document.onkeydown = function(e) {
        // Matikan F12
        if(e.keyCode == 123) return false;

        // Matikan Ctrl+Shift+I (Inspect)
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)) return false;

        // Matikan Ctrl+Shift+J (Console)
        if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)) return false;

        // Matikan Ctrl+U (View Source)
        if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)) return false;

        // Matikan Ctrl+S (Save Page)
        if(e.ctrlKey && e.keyCode == 'S'.charCodeAt(0)) return false;
        
        // Matikan Ctrl+P (Print/Screenshot ke PDF)
        if(e.ctrlKey && e.keyCode == 'P'.charCodeAt(0)) return false;
    };

    // 3. Mencegah Drag & Drop Gambar (Mencegah download tarik gambar)
    document.addEventListener('dragstart', function(e) {
        if (e.target.nodeName == 'IMG') {
            e.preventDefault();
        }
    });
</script>
<script>

    function reportActivity(type) {
    fetch('/log-security-activity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({ activity: type })
    });
}

// Contoh penggunaan:
document.addEventListener('contextmenu', function(e) {
    e.preventDefault();
    reportActivity('Klik Kanan Terdeteksi');
});

document.onkeydown = function(e) {
    if(e.keyCode == 123) { // F12
        reportActivity('Mencoba Buka F12 (Inspect)');
        return false;
    }
};
    // Deteksi tombol PrintScreen atau shortcut Screenshot
    document.addEventListener('keyup', (e) => {
        if (e.key === 'PrintScreen') {
            navigator.clipboard.writeText(''); // Kosongkan clipboard
            alert('Screenshot tidak diizinkan untuk alasan keamanan informasi.');
        }
    });

    // Mencegah klik kanan dan shortcut keyboard (Melengkapi skrip sebelumnya)
    document.addEventListener('keydown', function(e) {
        if (e.ctrlKey && (e.key === 'c' || e.key === 'v' || e.key === 'u' || e.key === 's')) {
            e.preventDefault();
            return false;
        }
    });
</script>
</body>

</html>