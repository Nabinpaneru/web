<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class BlogCategory extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function category(){
        return $this->belongsTo(Blog::class,'blog_id','id');
    }
}
