<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/articles', function () {
    $articles = \App\Models\Post::all();
    return response()->json([
        'articles' => $articles
    ]);
});

Route::get('/events', function () {
    $events = \App\Models\Event::all();
    return response()->json([
        'events' => $events
    ]);
});

Route::get('/jobs', function () {
    $jobs = \App\Models\Job::all();
    return response()->json([
        'jobs' => $jobs
    ]);
});
