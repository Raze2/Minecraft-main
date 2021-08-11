<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Staff;

class HomeController
{
    public function index()
    {
        $posts = Post::latest()->limit(4)->get();
        $staff = Staff::where('role', 'owner')->limit(3)->get();
        return view('frontend.home', compact('posts','staff'));
    }
}
