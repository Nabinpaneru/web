<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeSlide extends Model
{
    use HasFactory;

    // protected $guarded =[];
    protected $fillable = [
        'tittle',
        'short_tittle',
        'home_image',
        'vedio_url',
    ];
}
