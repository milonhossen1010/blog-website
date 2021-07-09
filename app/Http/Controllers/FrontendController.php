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
        $posts = Post::with('categories')->take(8)->latest()->get();
        return view('frontend.home', compact('posts'));
    }

    /**
     * Post function
     *
     * @return void
     */
    public function post()
    {
        $posts = Post::with('categories','tags')->latest()->paginate(9);
        return view('frontend.post', compact('posts'));
    }
}
