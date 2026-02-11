@extends('layouts.app')

@section('title', 'Profil - Ditbinmas Polda NTB')

@section('content')
<section class="relative bg-primary dark:bg-primary-dark py-16 overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-r from-primary via-primary/95 to-primary/80 dark:from-gray-900 dark:via-gray-900/95 dark:to-gray-900/80"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center sm:text-left flex flex-col sm:flex-row items-center justify-between gap-8">
        <div class="max-w-3xl">
            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white mb-4">
                Profil <span class="text-accent">Direktorat Binmas</span>
            </h1>
            <p class="text-gray-300 text-lg leading-relaxed max-w-2xl">
                Mewujudkan keamanan dan ketertiban masyarakat melalui kemitraan yang proaktif dan humanis di wilayah hukum Nusa Tenggara Barat.
            </p>
        </div>
        <div class="hidden sm:block opacity-20 transform translate-y-4">
            <span class="material-icons text-9xl text-white">shield</span>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 space-y-20">
    <section class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        <div class="lg:col-span-7 space-y-6">
            <div class="flex items-center gap-3 mb-2">
                <div class="h-1 w-12 bg-accent rounded-full"></div>
                <h2 class="text-2xl font-bold text-primary dark:text-white uppercase tracking-wide">Sejarah Singkat</h2>
            </div>
            <div class="prose prose-lg text-gray-600 dark:text-gray-300 text-justify leading-relaxed">
                <p>
                    Direktorat Pembinaan Masyarakat (Ditbinmas) Polda NTB dibentuk sebagai garda terdepan dalam upaya pencegahan kejahatan (pre-emtif). Sejak awal pembentukannya, Ditbinmas telah berevolusi dari fungsi kepolisian konvensional menjadi pendekatan pemolisian masyarakat (Community Policing) yang modern.
                </p>
                <p>
                    Dalam perkembangannya di wilayah Nusa Tenggara Barat, Ditbinmas terus beradaptasi dengan dinamika sosial budaya masyarakat Sasak, Samawa, dan Mbojo. Melalui berbagai program unggulan, Ditbinmas berkomitmen untuk tidak hanya menegakkan hukum, tetapi juga membangun kesadaran hukum masyarakat melalui pendekatan persuasif dan edukatif.
                </p>
            </div>
        </div>
        <div class="lg:col-span-5">
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-xl border-t-4 border-accent p-8 relative overflow-hidden h-full">
                <div class="relative z-10 space-y-8">
                    <div>
                        <h3 class="text-xl font-bold text-primary dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-accent mr-2">visibility</span> Visi
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 italic pl-4 border-l-2 border-gray-200">
                            "Terwujudnya masyarakat NTB yang aman, tertib, dan patuh hukum melalui kemitraan yang sinergis antara Polisi dan Masyarakat."
                        </p>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-primary dark:text-white mb-4 flex items-center">
                            <span class="material-icons text-accent mr-2">task_alt</span> Misi
                        </h3>
                        <ul class="space-y-3">
                            <li class="flex items-start"><span class="material-icons text-accent text-sm mt-1 mr-2">circle</span><span class="text-gray-600 dark:text-gray-300 text-sm">Meningkatkan kesadaran dan ketaatan hukum masyarakat.</span></li>
                            <li class="flex items-start"><span class="material-icons text-accent text-sm mt-1 mr-2">circle</span><span class="text-gray-600 dark:text-gray-300 text-sm">Membangun daya cegah dan daya tangkal masyarakat terhadap kejahatan.</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="border-gray-200 dark:border-gray-700"/>

    <section class="text-center">
        <div class="flex flex-col items-center mb-10">
            <span class="text-accent font-bold tracking-wider text-sm uppercase mb-2">Hierarki & Tanggung Jawab</span>
            <h2 class="text-3xl font-bold text-primary dark:text-white">Struktur Organisasi</h2>
            <div class="w-24 h-1 bg-accent mt-4 rounded-full"></div>
        </div>
        
        <div class="flex justify-center gap-8 mb-12">
            <div class="bg-primary text-white px-8 py-4 rounded-lg shadow-lg border-2 border-accent w-64">
                <h3 class="font-bold text-lg">DIR BINMAS</h3>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 px-4">
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">BAG BINOPSNAL</h5>
                <p class="text-xs text-gray-500 mt-1">Bagian Pembinaan Operasional</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">SUBDIT BINPOLMAS</h5>
                <p class="text-xs text-gray-500 mt-1">Pembinaan Perpolisian Masyarakat</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">SUBDIT BINSATPAM/POLSUS</h5>
                <p class="text-xs text-gray-500 mt-1">Pembinaan Satpam & Polisi Khusus</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">SUBDIT BINTIBSOS</h5>
                <p class="text-xs text-gray-500 mt-1">Pembinaan Ketertiban Sosial</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">SUBDIT BHABINKAMTIBMAS</h5>
                <p class="text-xs text-gray-500 mt-1">Bhayangkara Pembina Keamanan</p>
            </div>
            <div class="bg-gray-50 dark:bg-gray-800 p-6 rounded-lg border-l-4 border-primary shadow-sm hover:shadow-md transition text-left">
                <h5 class="font-bold text-primary dark:text-white">SUBBAG RENMIN</h5>
                <p class="text-xs text-gray-500 mt-1">Sub Bagian Perencanaan & Administrasi</p>
            </div>
        </div>
    </section>
</main>
@endsection