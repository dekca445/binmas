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
    // Ambil Data Sinergi (Partners)
    $partners = \App\Models\Partner::all();

    // Ambil Data Galeri
    $galleries = \App\Models\Gallery::where('is_published', true)->latest()->take(4)->get();

    return view('pages.home', compact('recentPosts', 'homeContent', 'members', 'services', 'partners', 'galleries'));
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

    public function berita(Request $request)
    {
        $query = \App\Models\Post::query();

        // Filter by Search
        if ($request->has('search') && $request->search != '') {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%')
                  ->orWhere('tags', 'like', '%' . $request->search . '%');
            });
        }

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->where('category', $request->category);
        }

        $posts = $query->where('is_published', true)->latest()->paginate(9)->withQueryString();
        
        // Data for Sidebar
        $populer = \App\Models\Post::where('is_published', true)->orderBy('views', 'desc')->take(5)->get();

        return view('pages.berita', compact('posts', 'populer'));
    }

    public function galeri()
    {
        $galleries = \App\Models\Gallery::where('is_published', true)->latest()->paginate(12);
        return view('pages.galeri', compact('galleries'));
    }

    public function kontak()
    {
        $contactContent = \App\Models\PageContent::where('page', 'contact')->get();
        $contactData = $contactContent->pluck('content', 'key');
        
        return view('pages.kontak', compact('contactData'));
    }
    public function sambutan()
    {
        $sambutanContent = \App\Models\PageContent::where('page', 'home')
                            ->where('section', 'sambutan')
                            ->get();
        $sambutanData = $sambutanContent->pluck('content', 'key');
        // Image is usually stored in 'image' key or separate field. 
        // In PageContent seeder, image is stored in 'image' column for key='image'.
        // Let's get the image URL from the record where key='image'.
        
        $imageRecord = $sambutanContent->where('key', 'image')->first();
        $imageUrl = $imageRecord ? $imageRecord->image : null;
        
        return view('pages.sambutan', compact('sambutanData', 'imageUrl'));
    }
}