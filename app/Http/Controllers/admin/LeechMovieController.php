<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Episode;
use Carbon\Carbon;

class LeechMovieController extends Controller
{
    
    public function leech_episode_store (Request $request, $slug) {
        $movie = Movie::where('slug',$slug)->first();
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        foreach ($resp['episodes'] as $key => $res) {
            foreach ($res['server_data'] as $key => $ser_data) {
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode-> linkphim = "<p><iframe width='560' height='315' src='".$ser_data['link_embed']."' allowfullscreen></iframe></p>";
                $episode->episode = $ser_data['name'];
                $episode->save();
            }
        }
        return redirect()->back();
    }   

    public function leech_movie() {
        $resp =Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=1")->json();

        return view('admin.pagesadmin.leech.index',compact('resp'));
    }
    public function leech_detaiil ($slug) {
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        $resp_movie[] = $resp['movie'];
        return view('admin.pagesadmin.leech.leech_detail',compact('resp_movie'));
    }

    public function leech_episode ($slug) {
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        return view('admin.pagesadmin.leech.leech_episode',compact('resp'));
    }

    public function leech_store(Request $request, $slug) {
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        $resp_movie[] = $resp['movie'];
        $movie = new Movie();
        foreach($resp_movie as $key => $res) {
        $movie->title = $res['name'];
        $movie->slug = $res['slug'];
        if(!is_numeric($res['episode_total'])) {
            $movie->so_tap = 0;
        }else{
            $movie->so_tap = $res['episode_total'];
        }
        $movie->description = $res['content'];
        $movie->status = 1;
        $movie->slide = 0;
        $movie->trailer = $res['trailer_url'];
        $movie->phim_hot = 0;

        $category= Category::orderBy('id','DESC')->first();
        $movie->category_id = $category->id;

        $country= Country::orderBy('id','DESC')->first();
        $movie->country_id = $country->id;

        $genre= Genre::orderBy('id','DESC')->first();
        $movie->genre_id = $genre->id;

        $movie->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->image = $res['thumb_url'];
        $movie->image1 = $res['poster_url'];
        $movie->actor = $request->actor;
        $movie->save();
        //Thêm nhiêu thể loại cho phim
        $movie->movie_genre()->attach($genre);
        return redirect()->back();
    }
}

    
    
    /**
     * 
     * 
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
