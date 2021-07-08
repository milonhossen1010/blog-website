<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::latest()->get();
        return view('admin.tag.index',[ 'tags' => $tags ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validation
        $request->validate([
            'name'  =>  'unique:tags'
        ]);

        //Data store 
        Tag::create([
            'name'          =>  $request->name,
            'slug'          =>  str_replace(' ','-',$request->name),
            'description'   =>  $request->description,
        ]); 

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return $tag;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        // //Validation
        // $request->validate([
        //     'name'  =>  "required|unique:tags,name,$tag->id"
        // ]);

        // //Update
        // $tag->name          = $request->name;
        // $tag->slug          = Str::slug($request->name);
        // $tag->description   = $request->description;

        // $tag->update();
        // return redirect()->route('tag.index')->with('success','Tag update successful!!');

        return $request->name;

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        
    }

    /**
     * Show all tags function
     *
     * @return void
     */
    public function showAll(){
       $tags =  Tag::latest()->get();
       return json_encode($tags);
    }

    /**
     * Delete function
     *
     * @param [type] $id
     * @return void
     */
    public function deleteTag($id){
        $tag = Tag::find($id);
        $tag -> delete();
    }

    /**
     * Update function
     *
     * @param Request $request
     * @return void
     */
    public function updateTag(Request $request){
        $tag = Tag::find($request->id);
        // Validation
        $request->validate([
            'name'  =>  "unique:tags,name,$tag->id"
        ]);

        

        $tag -> name = $request->name;
        $tag -> slug = Str::slug($request->name);
        $tag -> update();
         
    }

}
