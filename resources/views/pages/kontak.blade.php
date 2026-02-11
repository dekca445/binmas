@extends('layouts.app')

@section('title', 'Hubungi Kami - Ditbinmas Polda NTB')

@section('content')
<header class="bg-white dark:bg-gray-800 py-12 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center md:text-left">
        <h1 class="text-3xl md:text-4xl font-bold text-primary dark:text-white mb-3">Hubungi Kami</h1>
        <p class="text-gray-500 text-lg max-w-2xl">
            Silakan hubungi kami untuk pertanyaan, pengaduan, atau informasi lebih lanjut.
        </p>
    </div>
</header>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">
        <div class="lg:col-span-7">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 p-6 md:p-8">
                <h2 class="text-xl font-bold text-primary dark:text-white mb-6 flex items-center gap-2">
                    <span class="material-icons">mail_outline</span> Kirim Pesan
                </h2>
                <form class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                            <input class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary py-2.5 px-4" type="text" placeholder="Nama Anda">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary py-2.5 px-4" type="email" placeholder="email@contoh.com">
                        </div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                        <textarea class="w-full rounded-lg border-gray-300 focus:ring-primary focus:border-primary py-2.5 px-4" rows="5" placeholder="Tulis pesan Anda..."></textarea>
                    </div>
                    <button class="bg-primary hover:bg-primary-dark text-white font-medium py-3 px-8 rounded-lg shadow transition-all flex items-center gap-2">
                        <span class="material-icons text-sm">send</span> Kirim Pesan
                    </button>
                </form>
            </div>
        </div>

        <div class="lg:col-span-5">
            <div class="bg-primary text-white rounded-xl shadow-lg p-6 md:p-8 relative overflow-hidden">
                <h2 class="text-xl font-bold mb-6 border-b border-white/20 pb-4">Informasi Kontak</h2>
                <div class="space-y-6">
                    <div class="flex items-start gap-4">
                        <div class="bg-white/10 p-2.5 rounded-lg shrink-0"><span class="material-icons">location_on</span></div>
                        <div>
                            <h3 class="font-semibold text-sm opacity-90 mb-1">Alamat Kantor</h3>
                            <p class="text-sm leading-relaxed text-gray-200">Jl. Gajah Mada No. 100, Kota Mataram,<br>Nusa Tenggara Barat</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-white/10 p-2.5 rounded-lg shrink-0"><span class="material-icons">call</span></div>
                        <div>
                            <h3 class="font-semibold text-sm opacity-90 mb-1">Telepon</h3>
                            <p class="text-sm text-gray-200">(0370) 641123</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4">
                        <div class="bg-white/10 p-2.5 rounded-lg shrink-0"><span class="material-icons">email</span></div>
                        <div>
                            <h3 class="font-semibold text-sm opacity-90 mb-1">Email</h3>
                            <p class="text-sm text-gray-200">binmas@ntb.polri.go.id</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection