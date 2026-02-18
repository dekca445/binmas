<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    // Buka akses pengisian data (Mass Assignment)
    protected $guarded = [];

    // Casting tipe data
    protected $casts = [
        'gallery' => 'array', // Wajib: Agar bisa simpan banyak foto (JSON)
        'date'    => 'date',  // Agar format tanggal mudah diatur
    ];
}