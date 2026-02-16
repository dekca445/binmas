<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SatkerController extends Controller
{
    public function show($id)
    {
        // PERBAIKAN DI SINI:
        // Kita harus mengirim array ['targetSatker' => $id]
        // Agar di blade bisa dipanggil dengan nama $targetSatker
        
        return view('pages.satuan-fungsi', ['targetSatker' => $id]);
    }
}