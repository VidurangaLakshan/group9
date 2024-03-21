<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('home', [

                'featuredPosts' => Post::featured()->take(3)->latest('published_at')->get(),
                'recentPosts' => Post::latest()->take(9)->get(),
                'posts' => Post::latest()->get(),
                'categories' => Category::whereHas('posts', function($query){
                    $query->where('published_at', '<=', now());
                })->get(),

            ]);

    }
}
