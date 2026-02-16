<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index()
{
    // Mengambil data asli dari database (meskipun isinya masih kosong)
    $posts = \App\Models\Post::latest()->paginate(6); 
    $populer = \App\Models\Post::orderBy('views', 'desc')->take(3)->get();

    return view('pages.berita', compact('posts', 'populer'));
}

public function show($slug)
{
    // --- LOGIKA SIMULASI (Hapus blok if ini nanti jika Admin Panel sudah siap) ---
    if (str_contains($slug, 'simulasi-berita')) {
        // Kita buat Pura-pura Data Post (Object Palsu)
        $post = new \App\Models\Post();
        $post->judul = "Judul Berita Simulasi (Contoh Tampilan)";
        $post->kategori = "Simulasi";
        $post->penulis = "Admin Testing";
        $post->views = 123;
        $post->created_at = now();
        $post->gambar = null; // null = pakai gambar default
        $post->isi = "<p><strong>Ini adalah contoh isi berita.</strong> Karena database belum diisi oleh admin, maka halaman ini menampilkan data simulasi agar Anda bisa melihat desain layout detail beritanya.</p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio, nihil. Quos blanditiis tenetur unde suscipit, quam beatae rerum inventore consectetur, neque doloribus, cupiditate numquam sunt ipsa minus ex dicta? Eveniet, enim voluptate.</p>
                      <h3>Sub Judul Berita</h3>
                      <p>Isi paragraf kedua. Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellendus, voluptatum.</p>";
        
        // Buat sidebar kosong atau dummy juga
        $recentPosts = collect([]); 

        // Langsung tampilkan view tanpa cek database
        return view('pages.detail-berita', compact('post', 'recentPosts'));
    }
    // --- END LOGIKA SIMULASI ---


    // --- LOGIKA ASLI (Mencari ke Database) ---
    $post = \App\Models\Post::where('slug', $slug)->firstOrFail();
    
    // Ambil berita lain untuk sidebar (kecuali berita yang sedang dibuka)
    $recentPosts = \App\Models\Post::latest()->where('id', '!=', $post->id)->take(4)->get();
    
    // Tambah views
    $post->increment('views');

    return view('pages.detail-berita', compact('post', 'recentPosts'));
}
}