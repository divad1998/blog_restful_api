<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'blog_id'];

    function blog() {
        return $this->belongsTo(Blog::class);
    }

    function comments() {
        return $this->hasMany(BlogPostComment::class);
    }

    function likes() {
        return $this->hasMany(Like::class);
    }
}
