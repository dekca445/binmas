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
    
    // Ambil Konten Halaman Home
    $homeContent = \App\Models\PageContent::where('page', 'home')->get();

    // Ambil Data Member (Statistik)
    $members = \App\Models\Member::all();

    // Ambil Data Layanan
    $services = \App\Models\Service::all();

    // Ambil Data Sinergi (Partners)
    $partners = \App\Models\Partner::all();

    return view('pages.home', compact('recentPosts', 'homeContent', 'members', 'services', 'partners'));
}

    public function profil()
    {
        // 1. Konten Halaman Profil (Sejarah, Visi Misi, dll)
        $profilContent = \App\Models\PageContent::where('page', 'profil')->get();
        $profileData = $profilContent->pluck('content', 'key');

        // 2. Struktur Organisasi (Ambil root Pimpinan)
        $structureRoots = \App\Models\Official::whereNull('parent_id')
                            ->with('children.children.children')
                            ->get();

        // 3. Dokumen Akuntabilitas
        $documents = \App\Models\Document::all()->groupBy('category');

        return view('pages.profil', compact('profileData', 'structureRoots', 'documents'));
    }

    public function berita()
    {
        // Nanti di sini kita ambil data dari Database (Model)
        return view('pages.berita');
    }

    public function kontak()
    {
        $contactContent = \App\Models\PageContent::where('page', 'contact')->get();
        $contactData = $contactContent->pluck('content', 'key');
        
        return view('pages.kontak', compact('contactData'));
    }
    public function sambutan()
{
    return view('pages.sambutan');
}
}