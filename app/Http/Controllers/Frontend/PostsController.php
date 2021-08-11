<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostsController extends Controller
{

    public function index()
    {
        $posts = Post::with('media')->paginate(2);

        return view('frontend.posts.index', compact('posts'));
    }

    public function show(Post $post){
        return view('frontend.posts.show', compact('post'));
    }

  }
