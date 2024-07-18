<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = ['blog_post_id', 'user_id'];

    function blogPost() {
        $this->belongsTo(BlogPost::class);
    }

    function user() {
        $this->belongsTo(User::class);
    }
}
