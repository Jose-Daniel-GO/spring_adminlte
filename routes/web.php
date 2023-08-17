<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModalController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;


// POSTS
Route::resource('/posts', 'App\Http\Controllers\PostController');
Route::resource('/categories', 'App\Http\Controllers\CategoriesController');
// PRINCIPAL WELCOME
Route::get('/', function () {
    $posts = Post::select('*')->join('images', 'posts.id', '=', 'images.imageable_id')
        ->where('imageable_type', '=', Post::class)
        ->orderBy('posts.id', 'desc') // comienza desde el ultimo post
        ->get();

    return view('welcome', compact('posts'));
});
// LOGIN
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
});
 // Route::get('/profile', [UserController::class, 'profile']); 

// FUTURE E-COMMERCE
// Route::get('/bill', function (){
//     return view('carrito.index');
// });
