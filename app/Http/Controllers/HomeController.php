<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function jose()
    {
        $posts = Post::select('*')
        ->join('images', 'posts.id', '=', 'images.imageable_id')
        ->where('imageable_type', '=', Post::class)
        ->orderBy('posts.id', 'desc') // comienza desde el ultimo post
        ->get();
        
        return view('welcome', compact('posts'));
    }

    public function index()
    {
        $posts = Post::select('posts.*', 'users.name as user_name')->with('comments', 'user')->withCount('likes')->orderByDesc('created_at')
            ->join('categories', 'categories.id', '=', 'posts.category_id')
            ->join('users', 'users.id', '=', 'posts.user_id')
            ->latest()
            ->get();
        $commentsByPost = Comment::whereIn('post_id', $posts->pluck('id'))->orderBy('created_at')->get()->groupBy('post_id');

        return view('dashboard', compact('posts', 'commentsByPost'));
    }
}
