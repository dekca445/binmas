<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use \Illuminate\Database\Eloquent\Factories\HasFactory;
    
    protected $guarded = [];

    protected $casts = [
        'is_published' => 'boolean',
    ];
}
