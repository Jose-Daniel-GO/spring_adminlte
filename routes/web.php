<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

// POSTS
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/categories', 'App\Http\Controllers\CategoriesController');

// PRINCIPAL WELCOME
Route::get('/', function () {
    $posts = Post::select('*')
        ->join('images', 'posts.id', '=', 'images.imageable_id')
        ->where('imageable_type', '=', Post::class)
        ->orderBy('posts.id', 'desc') // comienza desde el ultimo post
        ->get();

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
    // Route::get('/profile', [UserController::class, 'profile']); 
});
// CATEGORY
// Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
// Route::post('categories',[CategoriesController::class, 'store'])->name('categories')->middleware('auth');
// Route::post('categories/{id}',[CategoriesController::class, 'show'])->name('categories-edit')->middleware('auth');
// Route::patch('categories/{id}',[CategoriesController::class, 'update'])->name('categories-update')->middleware('auth');
// Route::delete('categories/{id}',[CategoriesController::class, 'destroy'])->name('categories-destroy')->middleware('auth');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
