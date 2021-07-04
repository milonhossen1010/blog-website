<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        return view('admin.category.index');
    }

    /**
     * showAll function
     *
     * @return void
     */
    public function showAll()
    {
        return json_encode(Category::latest()->get());
    }

    /**
     * Store function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'unique:categories,name'
        ]);

        Category::create([
            'name'  =>  $request->name,
            'slug'  =>  Str::slug($request->name)
        ]);
    }

    /**
     * Edit function
     *
     * @param [type] $id
     * @return void
     */
    public function edit(Category $category)
    {
        return $category;
    }

    /**
     * update function
     *
     * @param Request $request
     * @param Category $category
     * @return void
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name'  =>  'unique:categories,name,$category->id'
        ]);
        $category->name = $request->name;
        $category->slug = Str::slug($request->name);
        $category->update();
    }

    /**
     * Destroy function
     *
     * @param [type] $id
     * @return void
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }




}
