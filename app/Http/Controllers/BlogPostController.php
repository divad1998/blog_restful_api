<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogPostRequest;
use App\Http\Requests\CommentRequest;
use App\Response;
use App\Services\BlogPostService;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{ 

    function __construct(private BlogPostService $service) {}

    function create($blog_id, BlogPostRequest $request) {
        $validated = $request->validated();
        $this->service->create($blog_id, $validated);
        return Response::response(message:"Created.", code:201);

    }

    function getAllByBlogId($blog_id) {
        $posts = $this->service->getAllByBlogId($blog_id);
        return Response::response(data:$posts);
    }

    // Create an endpoint to fetch details of a specific post and its likes and comments.
    function getById($id) {
        $post = $this->service->getById($id);
        return Response::response(data:$post);
    }

    //Create an endpoint to update an existing post
    function update($id, BlogPostRequest $request) {
        $post = $this->service->update($id, $request);
        return Response::response(data:$post);
    }

    function deleteById($id) {
        $this->service->deleteById($id);
        return Response::response();
    }

    function like($post_id, $user_id) {
        $this->service->like($post_id, $user_id);
        return Response::response(message:"Liked.", code:201);
    }

    function comment($post_id, $user_id, CommentRequest $request) {
        $validated = $request->validated();
        $comment = $this->service->comment($post_id, $user_id, $validated);

        return Response::response(data:$comment, code:201);
    }
}
