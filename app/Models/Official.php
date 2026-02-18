<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use HasFactory;
    protected $guarded = [];


    // app/Models/Official.php
    public function parent()
    {
        return $this->belongsTo(Official::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Official::class, 'parent_id');
    }
}
