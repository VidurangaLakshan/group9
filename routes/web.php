<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::get('/blog/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/blog2', [\App\Http\Controllers\PostController::class, 'index2']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
