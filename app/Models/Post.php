<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $guarded = [];


    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
    ];
    // Fitur pencarian (Scope)
    public function scopeFilter($query, array $filters)
    {
        // Jika ada pencarian
        if($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                  ->orWhere('content', 'like', '%' . $filters['search'] . '%');
        }
        
        // Jika ada filter kategori (opsional)
        if($filters['category'] ?? false) {
            $query->where('category', $filters['category']);
        }
    }
}