<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Category::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.category',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $nextPosition = Category::max('position') + 1;
        $category->position = $nextPosition;
        $category->save();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {   
        $category = Category::find($id);
        $list = Category::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.category',compact('list','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::find($id) -> delete();
        return redirect()->back();
    }

    public function resorting (Request $request) {
        $data = $request->all();

            foreach($data['array_id'] as $key => $value) {
                $category = Category::find($value);
                $category->position = $key;
                $category->save();
        }
    }
}
