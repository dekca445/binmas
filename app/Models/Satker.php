<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satker extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'fungsi' => 'array',
        'documents' => 'array',
        'faq' => 'array',    
        'agenda' => 'array', 
    ];
}
