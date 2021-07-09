<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts      = Post::latest()->get();
        $categories = Category::latest()->get();
        $tags       = Tag::latest()->get();
        return view('admin.post.index', compact(['posts','categories','tags']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.post.create', compact(['categories','tags']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'         =>  'required|unique:posts,title',
            'categories'    =>  'required',
            'tags'          =>  'required',
            'description'   =>  'required',
            'image'         =>  'required',
        ]);

        //Image upload function
        if($request->hasFile('image')){
           $image = $request->file('image');
           $imageNewName = time(). '.' . $image->getClientOriginalExtension();
           $image->move(public_path('storage/images/post'),$imageNewName);
            
        }

        $post = Post::create([
            'title'         =>  $request->title,
            'slug'          =>   Str::slug($request->title),
            'description'   =>  $request->description,
            'user_id'       =>  Auth::user()->id,
            'image'         =>  '/storage/images/post/'. $imageNewName,
        ]);

        $post->categories()->sync($request->categories);
        $post->tags()->sync($request->tags);

        return redirect()->back()->with('success','Post added successful!'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      
          if($post){
            //Image unlink
            if(file_exists(public_path($post->image))){
                unlink(public_path($post->image));
            }
            
            //Post category and tag detach
            $post->categories()->detach();
            $post->tags()->detach();
            //Delete post
            $post->delete();
          }
       
        
    }

    /**
     * Showall function
     *
     * @return void
     */
    public function showall(){
        return Post::with(['categories','user','tags'])->latest()->get();
    }

    /**
     * Status function
     *
     * @param Post $post
     * @return void
     */
    public function status(Post $post){
        if($post->status){
            $post->status= 0;
            $post->update();
            return 0;
        }else{
            $post->status=1;
            $post->update();
            return 1;
        }
    }
}
