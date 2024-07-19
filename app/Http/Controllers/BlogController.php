<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Response;
use App\Services\BlogService;
use Illuminate\Http\Request;

class BlogController extends Controller
{

    function __construct(private BlogService $service){}

    function create(BlogRequest $blogRequest) {
        $validated = $blogRequest->validated();
        $this->service->create($validated);
        return Response::response(message:"Created Successfully.", code: 201);
    } 

    function getAll() {
        $blogs = $this->service->getAll();
        return Response::response(data:$blogs); 
    }

    function getById($id) {
        $blog = $this->service->getById($id);
        return Response::response(data:$blog); 
    }

    function update($id, BlogRequest $request) {
        $validated = $request->validated();
        $blog = $this->service->update($id, $validated);
        return Response::response(data:$blog);
    }

    function deleteById($id) {
        $this->service->deleteById($id);
        return Response::response();
    }
}
