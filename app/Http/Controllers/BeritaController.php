<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::query();

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
        $populer = Post::where('is_published', true)->orderBy('views', 'desc')->take(5)->get();

        return view('pages.berita', compact('posts', 'populer'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        
        // Ambil berita lain untuk sidebar (kecuali berita yang sedang dibuka)
        $recentPosts = Post::where('is_published', true)
                            ->latest()
                            ->where('id', '!=', $post->id)
                            ->take(5)
                            ->get();
        
        // Tambah views
        $post->increment('views');

        return view('pages.detail-berita', compact('post', 'recentPosts'));
    }
}