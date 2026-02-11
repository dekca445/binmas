<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        return view('pages.home');
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
}