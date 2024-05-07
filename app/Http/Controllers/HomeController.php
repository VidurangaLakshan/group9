<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function homeNew() {

        return view('homeNew', [

            'featuredPosts' => Post::where('featured', true)->latest('published_at')->get(),
            'oldestPosts' => Post::orderBy('published_at', 'asc')->take(5)->get(),
            'popularPosts' => Post::orderBy('published_at', 'desc')->take(5)->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),


            'studentPosts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->orderBy('published_at', 'desc')
                ->whereHas('author', function ($query) {
                    $query->where('role', 7)->where('image', '!=', null);
                })
                ->take(4)
                ->get(),

            'alumniPosts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->orderBy('published_at', 'desc')
                ->whereHas('author', function ($query) {
                    $query->where('role', 8)->where('image', '!=', null);
                })
                ->take(4)
                ->get(),

            'academicsPosts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->orderBy('published_at', 'desc')
                ->whereHas('author', function ($query) {
                    $query->where('role', 5)->where('image', '!=', null);
                })
                ->take(4)
                ->get(),

            'nonAcademicsPosts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->orderBy('published_at', 'desc')
                ->whereHas('author', function ($query) {
                    $query->where('role', 6)->where('image', '!=', null);
                })
                ->take(4)
                ->get(),

            'upcomingEvents' => Event::where('status', true)
                ->where('start_date', '>', now()->format('Y-m-d'))
                ->take(4)
                ->get(),

            'pastEvents' => Event::where('status', true)
                ->where(function ($query) {
                    $query->where('start_date', '<', now()->format('Y-m-d'))
                        ->where('end_date', '<', now()->format('Y-m-d'));
                })
                ->orderBy('start_date', 'desc')
                ->take(4)
                ->get(),

        ]);
    }

    public function student() {

        return view('student', [

            'featuredPosts' => Post::where('featured', true)->take(5)->latest('published_at')->get(),
            'recentPosts' => Post::orderBy('published_at', 'desc')->take(5)->get(),
            'oldestPosts' => Post::orderBy('published_at', 'asc')->get(),
            'popularPosts' => Post::orderBy('published_at', 'desc')->get(),
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
            'recentPosts' => Post::orderBy('published_at', 'desc')->take(5)->get(),
            'oldestPosts' => Post::orderBy('published_at', 'asc')->get(),
            'popularPosts' => Post::orderBy('published_at', 'desc')->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

    public function staff() {

        return view('academics', [
            'featuredPosts' => Post::featured()->take(3)->latest('published_at')->get(),
            'recentPosts' => Post::orderBy('published_at', 'desc')->take(5)->get(),
            'oldestPosts' => Post::orderBy('published_at', 'asc')->get(),
            'popularPosts' => Post::orderBy('published_at', 'desc')->get(),
            'posts' => Post::where('published_at', '<=', now())
                ->where('approved', true)
                ->get(),
            'categories' => Category::whereHas('posts', function ($query) {
                $query->where('published_at', '<=', now());
            })->get(),

        ]);
    }

}
