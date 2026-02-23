<?php

namespace App\Http\Controllers;

use App\Models\Message; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;

class PesanController extends Controller
{
    public function kirim(Request $request)
    {
        $ip = $request->ip();
        $key = 'api-wa-limit:' . $ip;
        
        if (RateLimiter::tooManyAttempts($key, 2)) {
            return back()->with('error', 'Aktivitas mencurigakan terdeteksi. Silakan coba lagi nanti.');
        }

       // B. VALIDASI INPUT (Tambah Email)
    $request->validate([
        'nama' => 'required|string|min:3|max:50',
        'email' => 'required|email', // Tambahkan validasi email
        'whatsapp' => 'required|numeric',
        'kategori' => 'required',
        'pesan' => 'required|string|min:10|max:1000',
    ]);

        if ($request->filled('website')) {
            return abort(403);
        }

        // D. SIMPAN KE DATABASE
    $laporan = Message::create([
        'name' => strip_tags($request->nama),
        'email' => strip_tags($request->email), // Simpan email ke database
        'phone' => $request->whatsapp,
        'message' => "[" . $request->kategori . "] " . strip_tags($request->pesan),
        'status' => 'Baru',
    ]);

        RateLimiter::hit($key, 3600);

        return back()->with([
            'success' => 'Data Anda telah tersimpan.',
            'wa_data' => [
                'nama' => strtoupper($request->nama),
                'kategori' => $request->kategori,
                'pesan' => $request->pesan,
                'ref' => $laporan->id
            ]
        ]);
    }
}