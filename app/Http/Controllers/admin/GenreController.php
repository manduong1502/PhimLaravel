<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;

class GenreController extends Controller
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
        $list = Genre::all();
        return  view('admin.pagesadmin.genre',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->slug = $request->slug;
        $genre->description = $request->description;
        $genre->status = $request->status;
        $genre->save();
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
        $genre = Genre::find($id);
        $list = Genre::all();
        return  view('admin.pagesadmin.genre',compact('list','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genre = Genre::find($id);
        $genre->title = $request->title;
        $genre->slug = $request->slug;
        $genre->description = $request->description;
        $genre->status = $request->status;
        $genre->save();
        return redirect()->route('genre.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Genre::find($id) -> delete();
        return redirect()->back();
    }
}
