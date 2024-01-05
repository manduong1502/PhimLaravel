<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie_vip;
use App\Models\Episode_vip;
use App\Models\linkMovie;


class EpisodeMoiveVipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list_movie = Movie_vip::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode_vip::with('movie_vip')->orderBy('movie_vip_id','DESC')->get();
        return  view('admin.pagesadmin.movie_vip.episode_vip.form',compact(
            'list_movie',
            'list_episode'
        ));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $linkmovie = linkMovie::orderBy('id','DESC')->pluck('title','id');
        $list_movie = Movie_vip::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode_vip::with('movie_vip')->orderBy('movie_vip_id','DESC')->get();
        return  view('admin.pagesadmin.movie_vip.episode_vip.index',compact(
            'list_movie',
            'list_episode',
            'linkmovie'
        ));
    }

    public function add_episode_vip ($id) {
        $linkmovie = linkMovie::orderBy('id','DESC')->pluck('title','id');
        $list_server = linkMovie::orderBy('id','DESC')->get();
        $list_movie = Movie_vip::orderBy('id','DESC')->pluck('title','id');
        $list_episode = Episode_vip::with('movie_vip')->where('movie_vip_id',$id)->orderBy('episode','DESC')->get();
        $movie = Movie_vip::find($id);
        return  view('admin.pagesadmin.movie_vip.episode_vip.add_episode',compact(
            'list_movie',
            'list_episode',
            'movie',
            'linkmovie',
            'list_server'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $episode_vip = new Episode_vip();
        $episode_vip->movie_vip_id = $request->movie_vip_id;
        $episode_vip->linkphim = $request->linkphim;
        $episode_vip->server = $request->linkserver;
        $episode_vip->episode = $request->episode;
        $episode_vip->save();
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');;
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
            $episode_vip = Episode_vip::find($id);
            $list_movie = Movie_vip::all(); //
            $list_episode = Episode_vip::with('movie_vip')->orderBy('movie_vip_id','DESC')->get();

            $list_episodes = [];

            if ($episode_vip) {
                // Nếu có tập phim được chọn, lấy danh sách tập phim của phim đó
                $list_episodes = Episode_vip::where('movie_vip_id', $episode_vip->movie_id)
                    ->pluck('episode', 'id')
                    ->toArray();
            }
            return  view('admin.pagesadmin.movie_vip.episode_vip.index',compact('episode','list_episode','linkmovie','list_movie','list_episodes'))->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $episode_vip = new Episode_vip();
        $episode_vip->movie_vip_id = $request->movie_vip_id;
        $episode_vip->linkphim = $request->linkphim;
        $episode_vip->server = $request->linkserver;
        $episode_vip->episode = $request->episode;
        $episode_vip->save();
        return redirect()->route('episode.index')->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Episode_vip::find($id) -> delete();
        return redirect()->back()->with('success', 'Bạn đã xóa thành công');
    }
}
