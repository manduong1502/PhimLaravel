<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\linkMovie;
class linkMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = linkMovie::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.link.form',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.pagesadmin.link.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $linkMovie = new linkMovie();
        $linkMovie->title = $request->title;
        $linkMovie->description = $request->description;
        $linkMovie->status = $request->status;
        $linkMovie->save();    
        return redirect()->back()->with('success','Bạn đã thêm thành công');
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
        $linkmovie = linkMovie::find($id);
        $list = linkMovie::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.category.index',compact('list','linkmovie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $linkMovie = linkMovie::find($id);
        $linkMovie->title = $request->title;
        $linkMovie->description = $request->description;
        $linkMovie->status = $request->status;
        $linkMovie->save();
        return redirect()->route('linkmovie.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        linkMovie::find($id) -> delete();
        return redirect()->back();
    }
}
