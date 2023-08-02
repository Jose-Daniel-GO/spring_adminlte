<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::resource('/articulos', 'App\Http\Controllers\ArticuloController');

// POSTS
Route::resource('/posts', 'App\Http\Controllers\PostController');
// Route::get('/posts',[PostController::class, 'index'])->name('posts.index');
// Route::post('posts',[PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/{post}',[PostController::class, 'show'])->name('posts.show');
// PRINCIPAL WELCOME
Route::get('/', function () {
    $posts = Post::select('*')
        ->join('images', 'posts.id', '=', 'images.imageable_id')
        ->where('imageable_type', '=', Post::class)
        ->orderBy('posts.id', 'desc') // comienza desde el ultimo post
        ->get();
    // dd($posts);

    return view('welcome', compact('posts'));
    // return view('welcome');
});
// LOGIN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        $posts = Post::select('posts.*')
        ->join('categories', 'categories.id', '=', 'posts.category_id')
        ->latest()
        ->get();
        return view('dashboard', compact('posts'));
        // return view('dashboard');
    })->name('dashboard');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
