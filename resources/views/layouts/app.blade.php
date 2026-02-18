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
                        // Biru Navy yang lebih "Deep" dan Modern
                        "primary": "#0D1B3E",
                        "primary-dark": "#060D1F",

                        // Kuning Emas yang lebih hidup (Vibrant Gold)
                        "accent": "#FFD700",

                        // Emas Meredup (Muted Gold) untuk elemen sekunder
                        "accent-gold": "#C5A059",

                        // Background yang tidak putih polos (agar mata tidak cepat lelah)
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
        /* Gradasi Emas yang lebih mewah (dari Emas gelap ke Emas terang) */
        .gold-gradient-text {
            background: linear-gradient(to right, #BF953F, #FCF6BA, #B38728, #FBF5B7, #AA771C);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            display: inline-block;
            font-weight: bold;
        }

        /* Tambahan: Gradasi Biru untuk background section agar tidak flat */
        .blue-gradient-bg {
            background: linear-gradient(135deg, #0D1B3E 0%, #060D1F 100%);
        }
    </style>
</head>

<body
    class="bg-background-light dark:bg-background-dark font-display text-gray-800 dark:text-gray-200 antialiased flex flex-col min-h-screen">

    <nav class="sticky top-0 z-50 bg-primary dark:bg-primary-dark shadow-lg border-b-4 border-accent">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-4">
                    <div class="flex-shrink-0">
                        <div class="h-16 w-16 flex items-center justify-center">
                            <img src="{{ asset('images/logo-binmas.png') }}" alt="Logo Binmas"
                                class="h-full w-full object-contain p-1">
                            {{-- <span class="material-icons text-accent">local_police</span> --}}
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-white font-bold text-lg leading-tight tracking-wide">DITBINMAS POLDA NTB</h1>
                        <p class="text-accent text-xs font-medium tracking-wider uppercase">Direktorat Pembinaan
                            Masyarakat</p>
                    </div>
                </div>

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
                                {{-- LOGIKA DINAMIS: Ambil semua Satker dari Database --}}
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
                                    <span class="block px-4 py-2 text-xs text-gray-400 italic">Belum ada data
                                        Satker</span>
                                @endif
                            </div>
                        </div>

                        {{-- Baris 116 --}}
                        <a href="{{ route('berita.index') }}"
                            class="{{ request()->routeIs('berita.index') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-medium transition-colors">
                            Berita
                        </a>

                        {{-- Baris 118 --}}
                        <a href="{{ route('kontak') }}"
                            class="{{ request()->routeIs('kontak') ? 'text-white border-b-2 border-accent' : 'text-gray-300 hover:text-white' }} px-3 py-2 text-sm font-medium transition-colors">
                            Kontak
                        </a>
                    </div>
                </div>

                <div class="hidden md:flex items-center space-x-4">
                    <a href="#"
                        class="bg-accent hover:bg-yellow-400 text-primary font-bold py-2 px-4 rounded shadow-md transition-colors text-sm">
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

</body>

</html>
