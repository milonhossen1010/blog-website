<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(){
        $posts = Post::with('categories')->latest()->paginate(4);
        return view('frontend.home', compact('posts'));
    }

    /**
     * Post function
     *
     * @return void
     */
    public function post()
    {
        $posts = Post::paginate(2)->latest();
        return view('frontend.post', compact('posts'));
    }
}
