<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    protected static function booted()
{
    static::saving(function ($post) {
        // Cek jika ada file thumbnail baru yang di-upload
        if ($post->isDirty('thumbnail') && $post->thumbnail) {
            $path = storage_path('app/public/' . $post->thumbnail);
            
            // Inisialisasi gambar
            $img = Image::make($path);

            // Tambahkan teks Watermark di pojok kanan bawah
            $img->text('© DITBINMAS POLDA NTB', $img->width() - 20, $img->height() - 20, function($font) {
                $font->file(public_path('fonts/Inter-Bold.ttf')); // Pastikan path font benar
                $font->size(24);
                $font->color([255, 255, 255, 0.5]); // Putih dengan transparansi 50%
                $font->align('right');
                $font->valign('bottom');
            });

            // Simpan kembali gambar yang sudah di-watermark
            $img->save($path);
        }
    });
}


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