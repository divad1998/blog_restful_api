<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'cover_image', 'content'];

    function posts() {
        return $this->hasMany(BlogPost::class);
    }
}
