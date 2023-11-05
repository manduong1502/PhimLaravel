<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\linkMovie;
use App\Http\Requests\EpisodeRequest;
class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        return  view('admin.pagesadmin.episode.form',compact(
            'list_movie',
            'list_episode'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();
        return  view('admin.pagesadmin.episode.index',compact(
            'list_movie',
            'list_episode'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EpisodeRequest $request)
    {
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->linkphim = $request->linkphim;
        $episode->server = $request->linkserver;
        $episode->episode = $request->episode;
        $episode->save();
        return redirect()->back();
    }

    public function add_episode ($id) {
        $linkmovie = linkMovie::orderBy('id','DESC')->pluck('title','id');
        $list_server = linkMovie::orderBy('id','DESC')->get();
        $list_movie = Movie::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode::with('movie')->where('movie_id',$id)->orderBy('episode','DESC')->get();
        $movie = Movie::find($id);
        return  view('admin.pagesadmin.episode.add_episode',compact(
            'list_movie',
            'list_episode',
            'movie',
            'linkmovie',
            'list_server'
        ));
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
            $linkmovie = linkMovie::orderBy('id','DESC')->pluck('title','id');
            $episode = Episode::find($id);
            $list_movie = Movie::all(); //
            $list_episode = Episode::with('movie')->orderBy('movie_id','DESC')->get();

            $list_episodes = [];

            if ($episode) {
                // Nếu có tập phim được chọn, lấy danh sách tập phim của phim đó
                $list_episodes = Episode::where('movie_id', $episode->movie_id)
                    ->pluck('episode', 'id')
                    ->toArray();
            }
            return  view('admin.pagesadmin.episode.index',compact('episode','list_episode','linkmovie','list_movie','list_episodes'));
        }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episode = new Episode();
        $episode->movie_id = $request->movie_id;
        $episode->linkphim = $request->linkphim;
        $episode->server = $request->linkserver;
        $episode->episode = $request->episode;
        $episode->save();
        return redirect()->route('episode.index');
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
