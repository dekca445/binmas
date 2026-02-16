@extends('layouts.app')

@section('title', 'Sambutan Dirbinmas - Ditbinmas Polda NTB')

@section('content')

{{-- 1. HERO HEADER --}}
<div class="relative bg-gray-900 py-16 overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-20">
        <img src="https://www.transparenttextures.com/patterns/cubes.png" class="w-full h-full object-cover">
    </div>
    <div class="absolute inset-0 bg-gradient-to-b from-transparent to-gray-900"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <span class="text-accent font-bold tracking-widest uppercase text-xs mb-3 block animate-fade-in-down">Polda Nusa Tenggara Barat</span>
        <h1 class="text-3xl md:text-5xl font-black text-white mb-4 drop-shadow-lg font-serif">
            Sambutan Dirbinmas
        </h1>
        <div class="w-24 h-1 bg-accent mx-auto rounded-full"></div>
    </div>
</div>

{{-- 2. MAIN CONTENT --}}
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-10 relative z-10">
    <div class="bg-white dark:bg-gray-800 rounded-[2.5rem] shadow-2xl overflow-hidden border border-gray-100 dark:border-gray-700">
        <div class="p-8 md:p-16">
            
            <div class="flex flex-col lg:flex-row gap-16">
                
                {{-- KOLOM KIRI: FOTO PIMPINAN (Style Home Page) --}}
                <div class="w-full lg:w-4/12 flex flex-col items-center lg:items-start">
                    
                    {{-- Container Foto (Persis Home) --}}
                    <div class="relative w-[300px] h-[400px] group mx-auto lg:mx-0">
                        {{-- Kotak Hiasan Belakang --}}
                        <div class="absolute inset-0 bg-accent rounded-3xl transform translate-x-4 translate-y-4 transition-transform duration-300 group-hover:translate-x-6 group-hover:translate-y-6"></div>
                        
                        {{-- Container Gambar --}}
                        <div class="relative w-full h-full rounded-3xl overflow-hidden shadow-2xl border-4 border-white dark:border-gray-700 bg-gray-200">
                            <img src="https://via.placeholder.com/400x500" alt="Dirbinmas Polda NTB" class="w-full h-full object-cover object-top transition-transform duration-500 group-hover:scale-105">
                            
                            {{-- Label Nama Overlay --}}
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/90 to-transparent p-6 pt-12">
                                <h4 class="text-white font-bold text-lg leading-tight">Kombes Pol Desy Ismail, S.I.K.</h4>
                                <p class="text-accent text-xs font-bold uppercase tracking-widest mt-1">Dirbinmas Polda NTB</p>
                            </div>
                        </div>
                    </div>

                    {{-- Fitur Tambahan: Social Media Link --}}
                    <div class="mt-8 w-full max-w-[300px] mx-auto lg:mx-0 text-center lg:text-left">
                        <p class="text-sm font-bold text-gray-400 uppercase tracking-widest mb-3">Terhubung dengan Pimpinan</p>
                        <div class="flex justify-center lg:justify-start gap-3">
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fab fa-instagram"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fab fa-facebook-f"></i></a>
                            <a href="#" class="w-10 h-10 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center hover:bg-blue-600 hover:text-white transition shadow-sm"><i class="fab fa-twitter"></i></a>
                        </div>
                    </div>

                </div>

                {{-- KOLOM KANAN: TEKS SAMBUTAN --}}
                <div class="w-full lg:w-8/12">
                    
                    {{-- Headline (Style Home) --}}
                    <h2 class="text-3xl md:text-4xl font-black text-gray-900 dark:text-white mb-8 leading-tight">
                        Mewujudkan Kamtibmas yang <span class="relative text-primary dark:text-accent z-10">
                            Kondusif
                            <svg class="absolute w-full h-3 -bottom-1 left-0 -z-10 text-accent/40" viewBox="0 0 100 10" preserveAspectRatio="none">
                                <path d="M0 5 Q 50 10 100 5" stroke="currentColor" stroke-width="8" fill="none" />
                            </svg>
                        </span> Melalui Kemitraan.
                    </h2>

                    {{-- Isi Teks --}}
                    <div class="prose prose-lg text-gray-600 dark:text-gray-300 text-justify max-w-none">
                        <p class="lead font-bold text-gray-900 dark:text-white text-xl">
                            Assalamu’alaikum Warahmatullahi Wabarakatuh,<br>
                            Salam Presisi.
                        </p>
                        
                        <p>
                            Puji syukur kita panjatkan ke hadirat Allah SWT, Tuhan Yang Maha Esa, atas segala limpahan rahmat dan karunia-Nya, sehingga website resmi Direktorat Pembinaan Masyarakat (Ditbinmas) Polda Nusa Tenggara Barat ini dapat hadir di tengah-tengah masyarakat.
                        </p>
                        
                        <p>
                            Di era digitalisasi saat ini, keterbukaan informasi publik merupakan keniscayaan. Website ini kami hadirkan sebagai sarana komunikasi dua arah antara Polri dan masyarakat, serta sebagai wujud transparansi kinerja kami dalam mengemban tugas preemtif kepolisian.
                        </p>

                        {{-- Blockquote Estetik --}}
                        <div class="my-8 relative pl-8 py-2 border-l-4 border-accent bg-gray-50 dark:bg-gray-700/50 rounded-r-xl">
                            <span class="absolute top-0 left-2 text-4xl text-gray-300 font-serif">“</span>
                            <p class="italic text-gray-700 dark:text-gray-200 font-medium m-0">
                                Keamanan dan ketertiban bukanlah semata-mata tanggung jawab Polri, melainkan hasil dari sinergi dan kolaborasi harmonis antara aparat keamanan dan seluruh elemen masyarakat.
                            </p>
                        </div>
                        
                        <p>
                            Tugas Binmas tidaklah ringan. Kami berada di garda terdepan dalam membangun kesadaran hukum dan partisipasi aktif masyarakat. Melalui para Bhabinkamtibmas yang tersebar di seluruh pelosok desa, kami berupaya hadir menjadi solusi (problem solver) atas berbagai permasalahan sosial yang ada.
                        </p>
                        
                        <p>
                            Kami menyadari bahwa pelayanan kami belum sempurna. Oleh karena itu, melalui website ini, kami juga membuka ruang bagi masyarakat untuk memberikan saran, masukan, maupun pengaduan demi perbaikan kinerja kami ke depan.
                        </p>
                        
                        <p>
                            Semoga website ini bermanfaat bagi kita semua. Mari bersama-sama kita wujudkan Nusa Tenggara Barat yang aman, damai, dan kondusif.
                        </p>

                        <div class="mt-10 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <p class="font-bold text-gray-900 dark:text-white">
                                Wassalamu’alaikum Warahmatullahi Wabarakatuh.
                            </p>
                            
                            {{-- Tanda Tangan --}}
                            <div class="mt-6">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/e4/Signature_sample.svg/1200px-Signature_sample.svg.png" alt="Tanda Tangan" class="h-20 opacity-70 filter dark:invert">
                                <p class="text-sm text-gray-500 font-bold mt-2 uppercase tracking-widest">Dirbinmas Polda NTB</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            {{-- 3. FITUR BARU: FOKUS PRIORITAS (Grid Cards) --}}
            <div class="mt-20 pt-10 border-t border-gray-100 dark:border-gray-700">
                <div class="text-center mb-10">
                    <h3 class="text-2xl font-black text-gray-800 dark:text-white uppercase tracking-tight">Fokus Prioritas Kami</h3>
                    <p class="text-gray-500 mt-2">Pilar utama strategi pembinaan masyarakat Polda NTB.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="bg-blue-50 dark:bg-blue-900/20 p-6 rounded-2xl border border-blue-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-blue-600 text-3xl">handshake</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Kemitraan Aktif</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Memperkuat sinergi dengan Tokoh Agama, Tokoh Adat, dan Komunitas.</p>
                    </div>

                    <div class="bg-yellow-50 dark:bg-yellow-900/20 p-6 rounded-2xl border border-yellow-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-yellow-600 text-3xl">lightbulb</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Problem Solving</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Mengedepankan penyelesaian masalah sosial melalui pendekatan *Restorative Justice*.</p>
                    </div>

                    <div class="bg-green-50 dark:bg-green-900/20 p-6 rounded-2xl border border-green-100 hover:shadow-lg transition text-center group">
                        <div class="w-14 h-14 mx-auto bg-white rounded-full flex items-center justify-center shadow-sm mb-4 group-hover:scale-110 transition">
                            <span class="material-icons text-green-600 text-3xl">verified</span>
                        </div>
                        <h4 class="font-bold text-gray-800 dark:text-white mb-2">Pam Swakarsa</h4>
                        <p class="text-sm text-gray-600 dark:text-gray-300">Peningkatan kompetensi Satpam dan revitalisasi Satkamling / Pos Ronda.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection