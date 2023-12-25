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
use App\Models\Actor;
use Carbon\Carbon;


class LeechMovieController extends Controller
{
    // Thêm tập film
    public function leech_episode_store (Request $request, $slug) {
        $movie = Movie::where('slug',$slug)->first();
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        $categories = $resp['movie']['category'];
        $actors = $resp['movie']['actor'];

        foreach ($categories as $categoryData) {
            // Check if the category already exists in the database
            $genre = Genre::where('slug', $categoryData['slug'])->first();
    
            if (!$genre) {
                // Category doesn't exist, create and save it
                $genre = new Genre();
                $genre->title = $categoryData['name'];
                $genre->slug = $categoryData['slug'];
                $genre->status = 1;
                
                // Other category attributes if available
                $genre->save();
            }
    
            // Associate the movie with the category
            $movie->movie_genre()->attach($genre); 
            $movie->save();
        }

        if (isset($actors)) {
            foreach ($actors as $actorName) {
                // Tìm diễn viên theo tên hoặc một trường dữ liệu duy nhất khác để xác định
                $actor = Actor::where('name', $actorName)->first();
        
                if (!$actor) {
                    // Nếu không tìm thấy, tạo diễn viên mới
                    $newActor = new Actor();
                    $newActor->name = $actorName;
                    // Các thông tin khác nếu có
                    $newActor->save();
                    
                    // Gắn diễn viên mới vào phim
                    $movie->movie_actor()->attach($newActor->id);
                } else {
                    // Nếu diễn viên đã tồn tại, kiểm tra xem đã gắn vào phim chưa
                    $isAttached = $movie->movie_actor()->where('actor_id', $actor->id)->exists();
                    if (!$isAttached) {
                        // Nếu chưa gắn, thêm vào danh sách diễn viên của phim
                        $movie->movie_actor()->attach($actor->id);
                    }
                }
            }
            // Lưu lại phim sau khi đã gắn diễn viên vào mỗi phim
            $movie->save();
        }

        foreach ($resp['episodes'] as $key => $res) {
            foreach ($res['server_data'] as $key_data => $ser_data) {
                
                $episode = new Episode();
                $episode->movie_id = $movie->id;
                $episode-> linkphim = "<p><iframe width='560' height='315' src='".$ser_data['link_embed']."' allowfullscreen></iframe></p>";
                $episode->episode = $ser_data['name'];
                $episode->filename = $ser_data['filename'];
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
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
    }

    public function leech_episode_store_all(Request $request) {
        $selectedPage = $request->input('page', 1);
        $resp = Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=".$selectedPage)->json();
        $actorIds = [];
        if (isset($resp['items'])) {
            $movies = $resp['items'];
    
            foreach ($movies as $movieItem) {
                $slug = $movieItem['slug'];
                $movie = Movie::where('slug', $slug)->first();
            
                if ($movie) {
                    
                    $movieInfo = Http::get("https://ophim1.com/phim/$slug")->json();
                    $genres = $movieInfo['movie']['category'];
                    $countries = $movieInfo['movie']['country'];
                    $actors = $movieInfo['movie']['actor'];
                    //lưu danh mục của các film
                    if (isset($genres)) {
                    foreach ($genres as $categoryData) {
                        // Check if the category already exists in the database
                        $genre = Genre::where('slug', $categoryData['slug'])->first();
                
                        if (!$genre) {
                            // Category doesn't exist, create and save it
                            $genre = new Genre();
                            $genre->title = $categoryData['name'];
                            $genre->slug = $categoryData['slug'];
                            $genre->status = 1;
                            // Other category attributes if available
                            $genre->save();
                        }
                
                        
                        $movie->movie_genre()->attach($genre); 
                        $movie->save();
                    }
                    }
                    // thêm quốc gia
                    if (isset($countries)) {
                        foreach ($countries as $countryData) {
                            // Check if the category already exists in the database
                            $country = Country::where('slug', $countryData['slug'])->first();
                    
                            if (!$country) {
                                // Category doesn't exist, create and save it
                                $country = new Country();
                                $country->title = $countryData['name'];
                                $country->slug = $countryData['slug'];
                                $country->status = 1;
                                
                                // Other category attributes if available
                                $country->save();
                            }
                    
                            // Associate the movie with the category
                            $movie->country_id = $country->id; // Gán category_id cho phim
                            $movie->save();
                        }
                        }

                        // thêm diễn viên 

                        if (isset($actors)) {
                            foreach ($actors as $actorName) {
                                // Tìm diễn viên theo tên hoặc một trường dữ liệu duy nhất khác để xác định
                                $actor = Actor::where('name', $actorName)->first();
                        
                                if (!$actor) {
                                    // Nếu không tìm thấy, tạo diễn viên mới
                                    $newActor = new Actor();
                                    $newActor->name = $actorName;
                                    // Các thông tin khác nếu có
                                    $newActor->save();
                                    
                                    // Gắn diễn viên mới vào phim
                                    $movie->movie_actor()->attach($newActor->id);
                                } else {
                                    // Nếu diễn viên đã tồn tại, kiểm tra xem đã gắn vào phim chưa
                                    $isAttached = $movie->movie_actor()->where('actor_id', $actor->id)->exists();
                                    if (!$isAttached) {
                                        // Nếu chưa gắn, thêm vào danh sách diễn viên của phim
                                        $movie->movie_actor()->attach($actor->id);
                                    }
                                }
                            }
                            // Lưu lại phim sau khi đã gắn diễn viên vào mỗi phim
                            $movie->save();
                        }
                        
            
                    if (isset($movieInfo['episodes'])) {
                        foreach ($movieInfo['episodes'] as $key => $res) {
                            foreach ($res['server_data'] as $key_data => $ser_data) {
                                $existingEpisode = Episode::where('movie_id', $movie->id)
                                ->where('filename', $ser_data['filename']) // Check if the filename already exists
                                ->first();
                                if (!$existingEpisode) {
                                $episode = new Episode();
                                $episode->movie_id = $movie->id;
                                $episode->linkphim = "<p><iframe width='560' height='315' src='" . $ser_data['link_embed'] . "' allowfullscreen></iframe></p>";
                                $episode->episode = $ser_data['name'];
                                $episode->filename = $ser_data['filename'];
                                if($key_data ==0) {
                                    $linkmovie =LinkMovie::orderBy('id','DESC')->first();
                                    $episode->server = $linkmovie->id;
                                }else{
                                    $linkmovie =LinkMovie::orderBy('id','ASC')->first();
                                    $episode->server = $linkmovie->id;
                                }
                                $episode->created_at = Carbon::now('Asia/Ho_Chi_Minh');
                                $episode->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
                                $episode->save();
                                }
                            }
                        }
                    }
                }
            }
    
            return redirect()->back()->with('success', 'Đã thêm tất cả tập phim từ trang ' . $selectedPage . ' thành công');
        } else {
            return redirect()->back()->with('error', 'Không tìm thấy danh sách phim từ trang ' . $selectedPage . '!');
        }
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


    // thêm thông tin film theo trang
    public function leech_store(Request $request, $slug) {
        $resp =Http::get("https://ophim1.com/phim/".$slug)->json();
        $resp_movie[] = $resp['movie'];
        $movie = new Movie();
        foreach($resp_movie as $key => $res) {
        $movie->title = $res['name'];
        $movie->slug = $res['slug'];
        if(!is_numeric($res['episode_total'])) {
            $movie->so_tap = $res['episode_total'];
        }else{
            $movie->so_tap = $res['episode_total'];
        }
        $movie->description = $res['content'];
        $movie->status = 1;
        $movie->slide = 1;
        $movie->trailer = $res['trailer_url'];
        $movie->phim_hot = 1;
        $movie->nam_phim = $res['year'];
        $movie->origin_name = $res['origin_name'];

        $categoryData = $res['category'][0];
        $category = Category::where('slug', $categoryData['slug'])->first();

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
        $movie->view = $res['view'];
        $movie->type = $res['type'];
        $nextPosition = Movie::max('position') + 1;
        $movie->position = $nextPosition;
        $movie->save();
        //Thêm nhiêu thể loại cho phim
        $movie->movie_genre()->attach($genre);
        return redirect()->back();
    }
}
public function leech_store_all (Request $request) {
    $selectedPage = $request->input('page', 1);
    $resp = Http::get("https://ophim1.com/danh-sach/phim-moi-cap-nhat?page=".$selectedPage)->json();

    if (isset($resp['items']) && count($resp['items']) > 0) {
        $movies = $resp['items'];

        foreach ($movies as $movieItem) {
            $slug = $movieItem['slug'];
            $existingMovie = Movie::where('slug', $slug)->first();
            if (!$existingMovie) {
            $movieInfo = Http::get("https://ophim1.com/phim/$slug")->json();

            if (isset($movieInfo['movie'])) {
                $res = $movieInfo['movie'];

                $movie = new Movie();
                $movie->title = $res['name'];
                $movie->slug = $res['slug'];
                if(!is_numeric($res['episode_total'])) {
                $movie->so_tap = $res['episode_total'];
                }else{
                    $movie->so_tap = $res['episode_total'];
                }
                $movie->description = $res['content'];
                $movie->status = 1;
                $movie->slide = 1;
                $movie->trailer = $res['trailer_url'];
                $movie->phim_hot = 1;
                $movie->nam_phim = $res['year'];
                $movie->origin_name = $res['origin_name'];

                $category= Category::orderBy('id','DESC')->first();
                $movie->category_id = $category->id;

                $country= Country::orderBy('id','DESC')->first();
                $movie->country_id = $country->id;

                $genre= Genre::orderBy('id','DESC')->first();
                $movie->genre_id = $genre->id;


                $actor= Actor::orderBy('id','DESC')->first();
                $movie->actor_id = $actor->id;

                $movie->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
                $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');
                $movie->image = $res['thumb_url'];
                $movie->image1 = $res['poster_url'];
                $movie->time = $res['time'];
                $movie->quality = $res['quality'];
                $movie->lang = $res['lang'];
                $movie->view = $res['view'];
                $movie->type = $res['type'];

                $nextPosition = Movie::max('position') + 1;
                $movie->position = $nextPosition;
                $movie->save();
        //Thêm nhiêu thể loại cho phim
        $movie->movie_genre()->attach($genre);
        $movie->movie_actor()->attach($actor);
            }
        }
    }
        return redirect()->back()->with('success', 'Tất cả các phim từ trang ' . $selectedPage . ' đã được thêm vào cơ sở dữ liệu!');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy danh sách phim từ trang ' . $selectedPage . ' !');
    }
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
