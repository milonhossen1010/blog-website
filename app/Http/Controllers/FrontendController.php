<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

    /**
     * Single post function
     *
     * @param [type] $slug
     * @return void
     */
    public function singlePost($slug)
    {

        
        $post = Post::with('categories','user','tags')->where('slug', $slug)->first();



        if($post){

                if($post->categories->count()){
                    $get_category =  $post->categories[0]->id;
                    $recent_posts =  Category::find($post->categories[0]->id);
                }else {
                    $recent_posts = [];
                }
                

        

            return view('frontend.single-post', compact(['post','recent_posts']));
        }else{
            return redirect()-> route('frontend.notfound');
        }

    }

    /**
     * 404 function
     *
     * @return void
     */
    public function notFound(){
        return view('frontend.404');
    }


    /**
     * Post search function
     *
     * @param [type] $id
     * @return void
     */
    public function postSearch($id)
    {
       $data = Category::find($id);
      
       return view('frontend.search', compact('data'));
    }

    
    /**
     * Post user Search  function
     *
     * @param [type] $id
     * @return void
     */
    public function userSearch($id)
    {
       $data = User::find($id);
      
       return view('frontend.search', compact('data'));
    }




}
