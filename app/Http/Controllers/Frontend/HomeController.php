<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Game;

class HomeController
{
    public function index()
    {
        $posts = Post::latest()->limit(4)->get();
        return view('frontend.home', compact('posts'));
    }
}
