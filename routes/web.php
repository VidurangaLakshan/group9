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

//Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [\App\Http\Controllers\HomeController::class, 'homeNew'])->name('homeNew');


Route::get('/blog', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::get('/blog/{post:slug}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');

Route::get('/author/{post:user_id}', [\App\Http\Controllers\PostController::class, 'author'])->name('post.author');

//Route::get('/student', [\App\Http\Controllers\HomeController::class, 'student'])->name('student');

//Route::get('/alumni', [\App\Http\Controllers\HomeController::class, 'alumni'])->name('alumni');

//Route::get('/staff', [\App\Http\Controllers\HomeController::class, 'staff'])->name('staff');

Route::get('/job', [\App\Http\Controllers\JobController::class, 'index'])->name('job.index');

Route::get('/job/{job:slug}', [\App\Http\Controllers\JobController::class, 'show'])->name('job.show');

Route::get('/likes', [\App\Http\Controllers\PostController::class, 'likes'])->name('post.likes');




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
//        return view('dashboard');
        return redirect('/');
    })->name('dashboard');
});
