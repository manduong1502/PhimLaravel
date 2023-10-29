<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;
class EpisodeController extends Controller
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
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        return  view('admin.pagesadmin.episode',compact(
            'list_movie',
            'list_episode'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->linkphim = $request->linkphim;
        $episode->episode = $request->episode;
        $episode->save();
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
        $episode = Episode::find($id);
        $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        return  view('admin.pagesadmin.episode',compact('episode','list_episode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->linkphim = $request->linkphim;
        $episode->episode = $request->episode;
        $episode->save();
        return redirect()->route('genre.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Episode::find($id) -> delete();
        return redirect()->back();
    }

    public function selectmovie () {
        $id=$_GET['id'];
        $movie = Movie::find($id);
        
        $output ='<option>--Chọn tập phim--</option>';                         
        for($i = 1;$i <= $movie->so_tap;$i++) {
            $output.= '<option value="'.$i.'">'.$i.'</option>';
        }
        echo($output);
    }
}
