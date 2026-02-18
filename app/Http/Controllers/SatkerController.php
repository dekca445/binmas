<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satker;
use App\Models\Official;
use App\Models\Agenda;

class SatkerController extends Controller
{
    public function show($slug)
    {
        $satker = Satker::where('slug', $slug)->firstOrFail();

        // 1. Ambil Pimpinan Tertinggi (Root) di Unit ini
        // Syarat: Unit sama DAN tidak punya atasan (parent_id null)
        $rootOfficial = Official::where('unit', $satker->name)
                        ->whereNull('parent_id')
                        ->with('children.children.children') // Ambil sampai cicit (Level 3)
                        ->first();

        // 2. FIX ERROR: Definisikan $pimpinan untuk View (Alias dari Root)
        $pimpinan = $rootOfficial; 

        // 3. Ambil Agenda
        $agendas = Agenda::where('satker_name', $satker->name)
                    ->orderBy('date', 'desc')
                    ->get();

        // 4. Jika $pimpinan kosong (belum diinput), kirim null agar view tidak crash
        // View 'satker-detail' harus pakai @if($pimpinan) ... @endif
        return view('pages.satker-detail', compact('satker', 'rootOfficial', 'pimpinan', 'agendas'));
    }
}