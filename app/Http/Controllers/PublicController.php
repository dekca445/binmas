<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    // Di dalam method index() pada PublicController
public function index()
{
    // Ambil 3 berita terbaru untuk section "Kilas Berita"
    // Jika tabel posts belum ada/kosong, ini akan mengembalikan collection kosong
    $recentPosts = \App\Models\Post::latest()->take(3)->get();

    return view('pages.home', compact('recentPosts'));
}

    public function profil()
    {
        return view('pages.profil');
    }

    public function berita()
    {
        // Nanti di sini kita ambil data dari Database (Model)
        return view('pages.berita');
    }

    public function satuanFungsi($slug)
    {
        // Contoh untuk menangani sub-halaman dinamis
        return view('pages.satuan-fungsi');
    }

    public function kontak()
    {
        return view('pages.kontak');
    }
    public function sambutan()
{
    return view('pages.sambutan');
}
}