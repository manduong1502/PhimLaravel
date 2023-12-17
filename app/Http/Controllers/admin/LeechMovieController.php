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
use App\Models\LinkMovie;
use Carbon\Carbon;

class LeechMovieController extends Controller
{
    
    public function leech_episode_store (Request $request, $slug) {
        $movie = Movie::where('slug',$slug)->first();
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        foreach ($resp['episodes'] as $key => $res) {
            foreach ($res['server_data'] as $key_data => $ser_data) {
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode-> linkphim = "<p><iframe width='560' height='315' src='".$ser_data['link_embed']."' allowfullscreen></iframe></p>";
                $episode->episode = $ser_data['name'];
                if($key_data ==0) {
                    $linkmovie =LinkMovie::orderBy('id','DESC')->first();
                    $episode->server = $linkmovie->id;
                }else{
                    $linkmovie =LinkMovie::orderBy('id','ASC')->first();
                    $episode->server = $linkmovie->id;
                }
                $movie->created_at = Carbon::now('Asia/Ho_Chi_Minh');
                $movie->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
                $episode->save();
            }
        }
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');;
    }   

    public function leech_movie(Request $request) {
        $selectedPage = $request->input('page', 1);
        $resp =Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=".$selectedPage)->json();
        return view('admin.pagesadmin.leech.index',compact('resp','selectedPage'));
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
        $movie->nam_phim = $res['year'];

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
        $movie->time = $res['time'];
        $movie->quality = $res['quality'];
        $movie->lang = $res['lang'];
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

    public function watch_leech_detail(Request $request){ 
        $slug = $request->slug;

        $resp = Http::get('https://ophim1.com/phim/'.$slug)->json();
        $resp_array[] = $resp['movie'];

        $output['content_title'] = '<h3 style="text-align: center;text-transform: uppercase;">'.$resp['movie']['name'].'</h3>';

    	$output['content_detail'] = '
            <div class="row">
                <div class="col-md-5"><img src="'.$resp['movie']['thumb_url'].'" width="100%"></div>
                <div class="col-md-7">
                    <h5><b>Tên phim :</b>'.$resp['movie']['name'].'</h5>
                    <p><b>Tên tiếng anh:'.$resp['movie']['origin_name'].'</b></p>
                    <p><b>Trạng thái :</b> '.$resp['movie']['episode_current'].'</p>
                    <p><b>Số tập :</b> '.$resp['movie']['episode_total'].'</p>
                    <p><b>Thời lượng : </b>'.$resp['movie']['time'].'</p>
                    <p><b>Năm phát hành : </b>'.$resp['movie']['year'].'</p>
                    <p><b>Chất lượng : </b>'.$resp['movie']['quality'].'</p>
                    <p><b>Ngôn ngữ : </b>'.$resp['movie']['lang'].'</p>';
                    foreach($resp['movie']['director'] as $dir){
                        $output['content_detail'].='Đạo diễn: <span class="badge badge-pill badge-info">'.$dir.'</span><br>';
                    }
                    $output['content_detail'].='<b>Thể loại :</b>';

                    foreach($resp['movie']['category'] as $cate){
                        $output['content_detail'].='
                        <p><span class="badge badge-pill badge-info">'.$cate['name'].'</span></p>';
                    }
                    $output['content_detail'].='<b>Diễn viên :</b>';
                    foreach($resp['movie']['actor'] as $act){
                        $output['content_detail'].='
                        <p><span class="badge badge-pill badge-info">'.$act.'</span></p>';
                    }
                    $output['content_detail'].='<b>Quốc gia :</b>';
                    foreach($resp['movie']['country'] as $country){
                        $output['content_detail'].='
                        <p><span class="badge badge-pill badge-info">'.$country['name'].'</span></p>';
                    }
                    $output['content_detail'].='

                </div>
            </div>
        ';
          
    	echo json_encode($output);
    }
}
