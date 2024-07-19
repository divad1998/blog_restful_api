<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\BlogPostController;
use Illuminate\Support\Facades\Route;

Route::middleware(["token"])->controller(BlogController::class)->group(function() {
    Route::post('/blogs', 'create');
    Route::get('/blogs', 'getAll');
    Route::get('/blogs/{id}', 'getById');
    Route::put('/blogs/{id}', 'update');
    Route::delete('/blogs/{id}', 'deleteById');
});

//blog posts endpoints
Route::middleware(["token"])->controller(BlogPostController::class)->group(function() {
    Route::post('/blog_posts/{blog_id}',  'create');
    Route::get('/blog_posts/{blog_id}', 'getAllByBlogId');
    Route::get('/blogs/posts/{id}', 'getById');
    Route::put('/blogs/posts/{id}', 'update');
    Route::delete('/blogs/posts/{id}', 'deleteById');
    Route::post('/blogs/posts/{post_id}/{user_id}/likes', 'like');
    Route::post('/blogs/posts/{post_id}/{user_id}/comments', 'comment');
});