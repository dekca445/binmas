<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];



    // Fitur pencarian (Scope)
    public function scopeFilter($query, array $filters)
    {
        // Jika ada pencarian
        if($filters['search'] ?? false) {
            $query->where('judul', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('isi', 'like', '%' . $filters['search'] . '%');
        }
        
        // Jika ada filter kategori (opsional)
        if($filters['kategori'] ?? false) {
            $query->where('kategori', $filters['kategori']);
        }
    }
}