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
            'categories' => Category::whereHas('posts', function($query){
                $query->where('published_at', '<=', now())
                ->where('approved', true);
            })->get(),
        ]);

    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post,
        ]);
    }


}
