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
        // return view('admin.tag.create');
        return "hell";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // //Validation
        // $request->validate([
        //     'name'  =>  'required|unique:tags'
        // ]);

        // //Data store 
        // Tag::create([
        //     'name'          =>  $request->name,
        //     'slug'          =>  Str::slug($request->name),
        //     'description'   =>  $request->description,
        // ]);

        // return redirect()->back()->with('success', 'Tag added successful!!');

        return '$request->name';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('admin.tag.edit', compact('tag'));
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
        //Validation
        $request->validate([
            'name'  =>  "required|unique:tags,name,$tag->id"
        ]);

        //Update
        $tag->name          = $request->name;
        $tag->slug          = Str::slug($request->name);
        $tag->description   = $request->description;

        $tag->update();
        return redirect()->route('tag.index')->with('success','Tag update successful!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        if($tag){

            $tag->delete();
            return redirect()->back()->with('success','Tag deleted successful!');
        }
    }

    public function tagCreate(Request $request){
       return $request->all();
    }
}
