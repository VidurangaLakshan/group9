<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index() {

        return view('home', [

            'featuredPosts' => Post::where('featured', true)->take(3)->latest('published_at')->get(),
            'popularPosts' => Post::orderBy('published_at', 'desc')->take(9)->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

    public function student() {

        return view('student', [

            'featuredPosts' => Post::featured()->take(3)->latest('published_at')->get(),
            'recentPosts' => Post::latest()->take(9)->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

    public function alumni() {

        return view('alumni', [
            'featuredPosts' => Post::featured()->take(3)->latest('published_at')->get(),
            'recentPosts' => Post::latest()->take(9)->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

    public function staff() {

        return view('staff', [
            'featuredPosts' => Post::featured()->take(3)->latest('published_at')->get(),
            'recentPosts' => Post::latest()->take(9)->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

}
