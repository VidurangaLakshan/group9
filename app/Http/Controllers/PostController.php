<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'categories' => Category::
            whereHas('posts', function($query){
                $query->where('published_at', '<=', now());
            })->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }

    public function index2()
    {
        return view('posts.index2', [
            'categories' => Category::
            whereHas('posts', function($query){
                $query->where('published_at', '<=', now());
            })->get(),
        ]);
    }
}
