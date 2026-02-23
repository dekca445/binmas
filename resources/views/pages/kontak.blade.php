@extends('layouts.app')

@section('title', 'Hubungi Kami - Ditbinmas Polda NTB')

@section('content')

{{-- 1. HERO SECTION (Modern Parallax) --}}
<div class="relative h-[400px] overflow-hidden group">
    <div class="absolute inset-0">
        <img src="https://source.unsplash.com/1600x900/?callcenter,customer-service" alt="Contact Center" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
        <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-900/80 to-blue-900/50"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-full flex flex-col justify-center">
        <span class="text-accent font-bold tracking-widest uppercase mb-2 animate-fade-in-down">Layanan Masyarakat</span>
        <h1 class="text-4xl md:text-6xl font-black text-white mb-4 drop-shadow-lg">
            Hubungi <span class="text-transparent bg-clip-text bg-gradient-to-r from-yellow-400 to-yellow-200">Kami</span>
        </h1>
        <p class="text-gray-300 text-lg max-w-2xl leading-relaxed">
            Kami siap mendengar aspirasi, pengaduan, dan memberikan pelayanan informasi kepolisian untuk masyarakat Nusa Tenggara Barat.
        </p>
    </div>
</div>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16 -mt-20 relative z-20">
    
    {{-- 2. CONTACT INFO CARDS (Glassmorphism) --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-16">
        {{-- Card 1: Lokasi --}}
        <div class="bg-white rounded-2xl p-8 shadow-xl border-b-4 border-blue-600 hover:-translate-y-2 transition-all duration-300 group">
            <div class="w-16 h-16 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-blue-600 group-hover:text-white transition-colors">
                <span class="material-icons text-3xl">location_on</span>
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-2">Markas Komando</h3>
            <p class="text-gray-500 text-sm leading-relaxed mb-4">
                {!! $contactData['address'] ?? 'Jl. Gajah Mada No. 07, Pagesangan,<br>Kec. Mataram, Kota Mataram,<br>Nusa Tenggara Barat 83127' !!}
            </p>
            <a href="https://maps.google.com" target="_blank" class="text-blue-600 text-sm font-bold hover:underline flex items-center gap-1">
                Buka di Maps <span class="material-icons text-xs">open_in_new</span>
            </a>
        </div>

        {{-- Card 2: Layanan Suara --}}
        <div class="bg-white rounded-2xl p-8 shadow-xl border-b-4 border-green-500 hover:-translate-y-2 transition-all duration-300 group">
            <div class="w-16 h-16 bg-green-50 text-green-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-green-600 group-hover:text-white transition-colors">
                <span class="material-icons text-3xl">headset_mic</span>
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-2">Layanan Suara</h3>
            <div class="space-y-2">
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Call Center</span>
                    <span class="font-bold text-gray-800">110 (Bebas Pulsa)</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Telepon</span>
                    <span class="font-bold text-gray-800">{{ $contactData['phone'] ?? '(0370) 642xxx' }}</span>
                </div>
                <div class="flex items-center justify-between text-sm">
                    <span class="text-gray-500">Fax</span>
                    <span class="font-bold text-gray-800">{{ $contactData['fax'] ?? '(0370) 642xxx' }}</span>
                </div>
            </div>
        </div>

        {{-- Card 3: Digital --}}
        <div class="bg-white rounded-2xl p-8 shadow-xl border-b-4 border-yellow-500 hover:-translate-y-2 transition-all duration-300 group">
            <div class="w-16 h-16 bg-yellow-50 text-yellow-600 rounded-2xl flex items-center justify-center mb-6 group-hover:bg-yellow-500 group-hover:text-white transition-colors">
                <span class="material-icons text-3xl">alternate_email</span>
            </div>
            <h3 class="font-bold text-gray-800 text-xl mb-2">Korespondensi Digital</h3>
            <div class="space-y-3">
                <a href="mailto:{{ $contactData['email'] ?? 'ditbinmas@ntb.polri.go.id' }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition">
                    <span class="material-icons text-gray-400 text-sm">mail</span>
                    <span class="text-sm font-medium text-gray-700">{{ $contactData['email'] ?? 'ditbinmas@ntb.polri.go.id' }}</span>
                </a>
                <a href="{{ $contactData['website'] ?? '#' }}" class="flex items-center gap-3 p-2 rounded-lg hover:bg-gray-50 transition">
                    <span class="material-icons text-gray-400 text-sm">language</span>
                    <span class="text-sm font-medium text-gray-700">{{ $contactData['website'] ?? 'ntb.polri.go.id' }}</span>
                </a>
            </div>
        </div>
    </div>

    {{-- 3. MAIN CONTENT: FORM & MAP --}}
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-12">
        
       {{-- KOLOM KIRI: FORM PESAN (7 Kolom) --}}
<div class="lg:col-span-7">
    <div class="bg-white rounded-3xl shadow-lg p-8 md:p-10 border border-gray-100">
        <div class="flex items-center gap-4 mb-8">
            <div class="w-12 h-12 rounded-full bg-primary/10 flex items-center justify-center">
                <span class="material-icons text-primary">send</span>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Kirim Pesan & Aduan</h2>
                <p class="text-gray-500 text-sm">Identitas pelapor akan kami rahasiakan jika diminta.</p>
            </div>
        </div>

        {{-- Tambahkan ID pada form --}}
        @if(session('error'))
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm">
        <p class="font-bold">Gagal Mengirim</p>
        <p class="text-sm">{{ session('error') }}</p>
    </div>
@endif
        <form action="{{ route('pesan.kirim') }}" method="POST" id="contactForm" class="space-y-6">
    @csrf
    {{-- Field Honeypot (Sembunyikan dengan CSS) --}}
    <div style="display:none;">
        <input type="text" name="website" value="">
    </div>
           {{-- Cari bagian grid Nama dan WhatsApp, lalu ubah menjadi seperti ini --}}
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="space-y-2">
        <label class="text-xs font-bold text-gray-600 uppercase tracking-wide">Nama Lengkap</label>
        <input type="text" id="nama" name="nama" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Sesuai KTP">
    </div>
    <div class="space-y-2">
        <label class="text-xs font-bold text-gray-600 uppercase tracking-wide">Alamat Email</label>
        <input type="email" id="email" name="email" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="contoh@email.com">
    </div>
</div>

{{-- Nomor WhatsApp kita pindahkan ke bawah grid atau buat grid baru --}}
<div class="space-y-2">
    <label class="text-xs font-bold text-gray-600 uppercase tracking-wide">Nomor WhatsApp</label>
    <input type="tel" id="whatsapp" name="whatsapp" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="628xxxxxxx">
</div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-600 uppercase tracking-wide">Kategori Pesan</label>
                <select id="kategori" name="kategori" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition text-gray-700">
                    <option value="" disabled selected>Pilih tujuan pesan Anda...</option>
                    <option value="Pengaduan Masyarakat (Dumas)">Pengaduan Masyarakat (Dumas)</option>
                    <option value="Permohonan Informasi Publik">Permohonan Informasi Publik</option>
                    <option value="Konsultasi Satpam/BUJP">Konsultasi Satpam/BUJP</option>
                    <option value="Aspirasi / Kritik & Saran">Aspirasi / Kritik & Saran</option>
                </select>
            </div>

            <div class="space-y-2">
                <label class="text-xs font-bold text-gray-600 uppercase tracking-wide">Isi Pesan</label>
                <textarea id="pesan" name="pesan" rows="5" required class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3.5 focus:ring-2 focus:ring-primary focus:border-primary outline-none transition" placeholder="Jelaskan secara rinci..."></textarea>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-primary to-blue-800 hover:from-blue-800 hover:to-primary text-white font-bold py-4 rounded-xl shadow-lg hover:shadow-xl transition-all transform hover:-translate-y-1 flex justify-center items-center gap-2">
                Kirim Pesan Sekarang <span class="material-icons">near_me</span>
            </button>
        </form>
    </div>
</div>

        {{-- KOLOM KANAN: MAP & SOSMED (5 Kolom) --}}
        <div class="lg:col-span-5 space-y-8">
            
            {{-- Widget Peta --}}
            <div class="bg-white rounded-3xl shadow-lg p-2 border border-gray-100 h-[300px] relative group overflow-hidden">
                <iframe 
                    src="{{ $contactData['map_embed'] ?? 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3945.066547370682!2d116.10875731478347!3d-8.58960299382379!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dcdbf5c23d8659f%3A0x67396652433f829!2sPolda%20Nusa%20Tenggara%20Barat!5e0!3m2!1sid!2sid!4v1625632123456!5m2!1sid!2sid' }}" 
                    width="100%" height="100%" style="border:0; border-radius: 1rem;" 
                    allowfullscreen="" loading="lazy">
                </iframe>
                <div class="absolute bottom-4 left-4 bg-white/90 backdrop-blur px-4 py-2 rounded-lg shadow-md text-xs font-bold text-primary">
                    Polda NTB
                </div>
            </div>

            {{-- Widget Sosmed & Jam (Fitur Baru) --}}
            <div class="bg-gradient-to-br from-blue-900 to-primary rounded-3xl p-8 text-white shadow-xl relative overflow-hidden">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white opacity-5 rounded-full -mr-10 -mt-10"></div>
                
                <h3 class="font-bold text-xl mb-6 flex items-center">
                    <span class="material-icons mr-2 text-accent">connect_without_contact</span> Media Sosial
                </h3>
                
                <div class="grid grid-cols-2 gap-4 mb-8">
                    <a href="{{ $contactData['instagram_url'] ?? '#' }}" class="flex items-center gap-3 bg-white/10 p-3 rounded-xl hover:bg-white/20 transition">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" class="w-6 h-6">
                        <span class="text-sm font-medium">Instagram</span>
                    </a>
                    <a href="{{ $contactData['facebook_url'] ?? '#' }}" class="flex items-center gap-3 bg-white/10 p-3 rounded-xl hover:bg-white/20 transition">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" class="w-6 h-6">
                        <span class="text-sm font-medium">Facebook</span>
                    </a>
                    <a href="{{ $contactData['twitter_url'] ?? '#' }}" class="flex items-center gap-3 bg-white/10 p-3 rounded-xl hover:bg-white/20 transition">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/c/ca/LinkedIn_logo_initials.png" class="w-6 h-6">
                        <span class="text-sm font-medium">Twitter/X</span>
                    </a>
                    <a href="{{ $contactData['youtube_url'] ?? '#' }}" class="flex items-center gap-3 bg-white/10 p-3 rounded-xl hover:bg-white/20 transition">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/09/YouTube_full-color_icon_%282017%29.svg" class="w-6 h-auto">
                        <span class="text-sm font-medium">YouTube</span>
                    </a>
                </div>

                <div class="border-t border-white/20 pt-6">
                    <h4 class="font-bold text-sm text-blue-200 uppercase tracking-widest mb-3">Jam Operasional</h4>
                    <ul class="text-sm space-y-2">
                        <li class="flex justify-between"><span>Senin - Kamis</span> <span class="font-bold text-accent">08.00 - 15.00</span></li>
                        <li class="flex justify-between"><span>Jumat</span> <span class="font-bold text-accent">08.00 - 15.30</span></li>
                        <li class="flex justify-between text-white/50"><span>Sabtu - Minggu</span> <span>Libur</span></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    {{-- 4. NEW FEATURE: FAQ SECTION (Accordion Style) --}}
    <div class="mt-20">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-black text-gray-800 uppercase tracking-tight">Sering Ditanyakan (FAQ)</h2>
            <div class="w-20 h-1.5 bg-accent mx-auto mt-3 rounded-full"></div>
        </div>

        <div class="max-w-4xl mx-auto space-y-4">
            {{-- FAQ Item 1 --}}
            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden open:ring-2 open:ring-primary/50 transition">
                <summary class="flex justify-between items-center p-5 cursor-pointer bg-gray-50 group-hover:bg-white transition font-bold text-gray-800">
                    Bagaimana cara mengurus Kartu Tanda Anggota (KTA) Satpam?
                    <span class="material-icons transition-transform group-open:rotate-180 text-gray-400">expand_more</span>
                </summary>
                <div class="p-5 text-gray-600 leading-relaxed border-t border-gray-100">
                    Pengurusan KTA Satpam dapat dilakukan melalui BUJP tempat Anda bernaung atau datang langsung ke loket pelayanan Sie Satpam Ditbinmas Polda NTB dengan membawa sertifikat Gada Pratama/Madya dan persyaratan administrasi lainnya.
                </div>
            </details>

            {{-- FAQ Item 2 --}}
            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden open:ring-2 open:ring-primary/50 transition">
                <summary class="flex justify-between items-center p-5 cursor-pointer bg-gray-50 group-hover:bg-white transition font-bold text-gray-800">
                    Apakah layanan pengaduan dipungut biaya?
                    <span class="material-icons transition-transform group-open:rotate-180 text-gray-400">expand_more</span>
                </summary>
                <div class="p-5 text-gray-600 leading-relaxed border-t border-gray-100">
                    Tidak. Seluruh layanan pengaduan masyarakat di lingkungan Ditbinmas Polda NTB <strong>GRATIS</strong> dan tidak dipungut biaya sepeserpun. Laporkan jika ada oknum yang meminta pungutan liar.
                </div>
            </details>

            {{-- FAQ Item 3 --}}
            <details class="group bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden open:ring-2 open:ring-primary/50 transition">
                <summary class="flex justify-between items-center p-5 cursor-pointer bg-gray-50 group-hover:bg-white transition font-bold text-gray-800">
                    Bagaimana cara mengundang Narasumber Binluh ke Sekolah/Kampus?
                    <span class="material-icons transition-transform group-open:rotate-180 text-gray-400">expand_more</span>
                </summary>
                <div class="p-5 text-gray-600 leading-relaxed border-t border-gray-100">
                    Silakan mengirimkan surat permohonan resmi yang ditujukan kepada <strong>Dirbinmas Polda NTB</strong>. Surat dapat diantar langsung atau dikirim melalui email resmi kami minimal 7 hari sebelum acara dilaksanakan.
                </div>
            </details>
        </div>
    </div>

</main>

{{-- 5. NEW FEATURE: FLOATING WHATSAPP BUTTON --}}
<a href="https://wa.me/6287852566508?text=Halo%20Admin%20Ditbinmas,%20saya%20ingin%20bertanya..." target="_blank" 
   class="fixed bottom-8 right-8 bg-green-500 hover:bg-green-600 text-white p-4 rounded-full shadow-2xl flex items-center justify-center z-50 transition-all hover:scale-110 animate-bounce group"
   title="Chat WhatsApp">
    <img src="https://upload.wikimedia.org/wikipedia/commons/6/6b/WhatsApp.svg" class="w-8 h-8 filter brightness-0 invert">
    <span class="absolute right-full mr-3 bg-white text-gray-800 px-3 py-1 rounded-lg text-xs font-bold shadow-md opacity-0 group-hover:opacity-100 transition-opacity whitespace-nowrap">
        Chat Kami
    </span>
</a>

@if(session('wa_data'))
    <div id="wa-modal" class="fixed inset-0 bg-black/60 backdrop-blur-sm z-[999] flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-8 max-w-sm w-full text-center shadow-2xl animate-bounce-in">
            <div class="w-20 h-20 bg-green-100 text-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <span class="material-icons text-4xl">check_circle</span>
            </div>
            <h2 class="text-2xl font-bold text-gray-900 mb-2">Laporan Tersimpan!</h2>
            <p class="text-gray-500 mb-8 text-sm">Data Anda sudah masuk ke sistem kami. Silakan lanjut ke WhatsApp untuk mempercepat respon petugas.</p>
            
            <button onclick="lanjutKeWhatsApp()" class="w-full bg-green-500 hover:bg-green-600 text-white font-bold py-4 rounded-xl shadow-lg transition-all flex justify-center items-center gap-2">
                Lanjut ke WhatsApp <span class="material-icons text-sm">open_in_new</span>
            </button>
        </div>
    </div>

    <script>
        function lanjutKeWhatsApp() {
            const data = @json(session('wa_data'));
            const nomorAdmin = "6287852566508";
            
            const teks = `🚨 *LAPORAN MASUK (REF: #${data.ref})* 🚨%0A` +
                         `━━━━━━━━━━━━━━━━━━━━━%0A` +
                         `👤 *PENGIRIM:* ${data.nama}%0A` +
                         `📂 *UNIT:* ${data.kategori}%0A%0A` +
                         `📝 *ISI PESAN:*%0A_${data.pesan}_%0A` +
                         `━━━━━━━━━━━━━━━━━━━━━%0A` +
                         `📅 *TANGGAL:* ${new Date().toLocaleString('id-ID')} WITA`;

            window.open(`https://wa.me/${nomorAdmin}?text=${teks}`, '_blank');
            document.getElementById('wa-modal').remove();
        }
    </script>
@endif

@if ($errors->any())
    <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-xl shadow-sm">
        <ul class="list-disc ml-5 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection