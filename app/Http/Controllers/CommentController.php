<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index(Request $request)
    {
          return [
            'comments'  =>  Comment::with('user')->where('post_id', $request->id)->where('comment_id', null)->latest()->get(),
            'reply'  =>  Comment::with('user')->where('post_id', $request->id)->where('comment_id','!=', null  )->latest()->get(),
          ];
        // return $post = Post::with('user')->find($id)->comments;

        // return $post->comments;
        
    }

    /**
     * Store function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        Comment::create([
            'post_id'   =>  $request->id,
            'user_id'   =>  Auth::user()->id,
            'comment'   =>  $request->comment,
        ]);
 
    }

    /**
     * Reply function
     *
     * @param Request $request
     * @return void
     */
    public function reply(Request $request)
    {
        Comment::create([
            'user_id'       =>  Auth::user()->id,
            'comment_id'    =>  $request->commentID,
            'post_id'       =>  $request->id,
            'comment'       =>  $request->reply,
        ]);
    }
}
