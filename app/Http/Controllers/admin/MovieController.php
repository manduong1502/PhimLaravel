<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Movie_actor;
use App\Models\Actor;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Http\Requests\MovieRequest;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::pluck('title', 'id');
    $country = Country::pluck('title', 'id');
    $genre = Genre::pluck('title', 'id');
    $actor = Actor::pluck('name', 'id');
    $list_genre = Genre::all();
    $list = Movie::with('category', 'country', 'genre', 'movie_genre','movie_actor','actor')->withCount('episode')->orderBy('id', 'DESC')->get()->take(40);
    
    
    // Đảm bảo biến movie_genre đã được định nghĩa và cung cấp nó trong mảng compact
    $movie_genre = Genre::pluck('title', 'id');
    $list_actor = Actor::all();
    $movie_actor = Actor::pluck('name', 'id');

        $path = public_path()."/json/";
        if(!is_dir($path)) {
            mkdir($path,0777,true);
        }
        File::put($path. 'movies.json',json_encode($list));
        return view('admin.pagesadmin.movie.form',compact(
        'list',
        'country',
        'genre',
        'category',
        'list_genre',
        'movie_genre',
        'movie_actor',
        'list_actor',
        'actor'
        ));
    }

    public function sort_movie () {
        $category = Category::orderBy('position','ASC')->get();
        $category_home = Category::with(['movie'=> function($q) {$q->withCount('episode');}])->where('status',1)->orderBy('position','ASC') ->get();
        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('position','DESC')->get();
        return view('admin.pagesadmin.movie.sort_movie',compact('category','category_home','phimhot'));
    }

    public function sort_movie_navbar (Request $request) {
        $data = $request->all();
        foreach($data['array_id'] as $key => $value) {
            $category = Category::find($value);
            $category -> position = $key;
            $category -> save();
        }
     }

     public function sort_movie_movie (Request $request) {
        $data = $request->all();
        foreach($data['array_id'] as $key => $value) {
            $movie = Movie::find($value);
            $movie -> position = $key;
            $movie -> save();
        }
     }


    
    public function update_year (Request $request) {
        $movie = new Movie();
        $data = $request->all();
        $movie = Movie::find($data['id_phim']);
        $movie->nam_phim = $data['year'];
        $movie->save();
        return redirect()->route('movie.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $category = Category::pluck('title', 'id');
    $country = Country::pluck('title', 'id');
    $genre = Genre::pluck('title', 'id');
    $actor = Actor::pluck('name', 'id');
    $list_genre = Genre::all();
    $list_actor = Actor::all();
    $list = Movie::with('category', 'country', 'genre', 'movie_genre','movie_actor')->withCount('episode')->orderBy('id', 'DESC')->get();
    // Đảm bảo biến movie_genre đã được định nghĩa và cung cấp nó trong mảng compact
    $movie_genre = Genre::pluck('title', 'id');
    $movie_actor = Actor::pluck('name', 'id');
    
    return view('admin.pagesadmin.movie.index', compact(
        'list',
        'country',
        'genre',
        'category',
        'list_genre',
        'movie_genre', // Thêm biến movie_genre vào danh sách các biến cần truyền vào view
        'list_actor',
        'movie_actor'

    ));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(MovieRequest $request)
    {
        $data =$request->all();
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->so_tap = $request->so_tap;
        $movie->description = $request->description;
        $movie->status = $request->status;
        $movie->slide = $request->slide;
        $movie->trailer = $request->trailer;
        $movie->phim_hot = $request->phim_hot;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');
        $nextPosition = Movie::max('position') + 1;
        $movie->position = $nextPosition;
        $movie->time = $request->time;
        $movie->quality = $request->quality;
        $movie->lang = $request->lang;
        $movie->view = $request->view;
        $movie->type = $request->type;
        $movie->nam_phim = $request->nam_phim;
        $movie->origin_name = $request->origin_name;
        
        
        
        foreach($data['genre'] as $key => $gen) {
            $movie -> genre_id = $gen[0];
        }

        foreach($data['actor'] as $key => $act) {
            $movie -> actor_id = $act[0];
        }


        //thêm hình ảnh nhỏ
        $get_image = $request ->file('image');
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie->image = $new_image;
        }

        //thêm hình ảnh lớn
        $get_image1 = $request ->file('image1');
        if($get_image1) {
            $get_name_image1 = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image1 = current(explode('.',$get_name_image1)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image1 =  $name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/movie/imagebig',$new_image1);
            $movie->image1 = $new_image1;
        }

        $movie->save();
        //Thêm nhiêu thể loại cho phim
        $movie->movie_genre()->attach($data['genre']);
        $movie->movie_actor()->attach($data['actor']);
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
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $actor = Actor::pluck('name','id');
        $list = Movie::with('category','country','genre','movie_genre','movie_actor')->orderBy('id','DESC')->get();
        $list_genre = Genre::all();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        $list_actor = Actor::all();
        $movie_actor = $movie->movie_actor;
        
        if (!$movie) {
            return redirect()->route('movie.create')->with('error', 'Không tìm thấy bộ phim.');
        }
        return  view('admin.pagesadmin.movie.index',compact(
            'list',
            'country',
            'genre',
            'category',
            'movie',
            'list_genre',
            'movie_genre',
            'list_actor',
            'movie_actor',
            'actor'
        ))->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->so_tap = $request->so_tap;
        $movie->description = $request->description;
        $movie->trailer = $request->trailer;
        $movie->status = $request->status;
        $movie->slide = $request->slide;
        $movie->phim_hot = $request->phim_hot;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');

        $movie->time = $request->time;
        $movie->quality = $request->quality;
        $movie->lang = $request->lang;
        $movie->view = $request->view;  
        $movie->type = $request->type;
        $movie->nam_phim = $request->nam_phim;
        $movie->origin_name = $request->origin_name;

        foreach($data['genre'] as $key => $gen) {
            $movie -> genre_id = $gen[0];
        }

        foreach($data['actor'] as $key => $act) {
            $movie -> actor_id = $act[0];
        }

        //thêm hình ảnh
        $get_image = $request ->file('image');
        if($get_image) {
            if (!empty ($movie->image)) {
                unlink('uploads/movie/'.$movie->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie->image = $new_image;
        }

        //thêm hình ảnh lớn
        $get_image1 = $request ->file('image1');
        if($get_image1) {
            if (!empty ($movie->image1)) {
                unlink('uploads/movie/imagebig/'.$movie->image1);
            }
            $get_name_image1 = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image1 = current(explode('.',$get_name_image1)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image1 =  $name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/movie/imagebig',$new_image1);
            $movie->image1 = $new_image1;
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
        $movie->movie_actor()->sync($data['actor']);
        return redirect()->route('movie.index')->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        if(file_exists('uploads/movie/'.$movie->image1)){
            unlink('uploads/movie/'.$movie->image1);
        } 
        //Nhiều thể loại
        //Điều kiện lấy film
        Movie_Actor::whereIn('movie_id', [$movie->id])->delete(); 
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete(); 
        Episode::whereIn('movie_id', [$movie->id])->delete(); 
        $movie->delete();
        return redirect()->back()->with('success', 'Bạn đã xóa thành công');
    }

    public function resorting (Request $request) {
        $data = $request->all();

            foreach($data['array_id'] as $key => $value) {
                $movie = Movie::find($value);
                $movie->position = $key;
                $movie->save();
        }
    }

    public function category_choose(Request $request) {
        $data =$request -> all();
        $movie = Movie::find($data['movie_id']);
        $movie->category_id = $data['category_id'];
        $movie->save();
    }

    public function country_choose(Request $request) {
        $data =$request -> all();
        $movie = Movie::find($data['movie_id']);
        $movie->country_id = $data['country_id'];
        $movie->save();
    }

    public function trangthai_choose(Request $request) {
        $data =$request -> all();
        $movie = Movie::find($data['movie_id']);
        $movie->status = $data['trangthai_val'];
        $movie->save();
    }

    public function phimhot_choose(Request $request) {
        $data =$request -> all();
        $movie = Movie::find($data['movie_id']);
        $movie->phim_hot = $data['phimhot_val'];
        $movie->save();
    }

    public function slide_choose(Request $request) {
        $data =$request -> all();
        $movie = Movie::find($data['movie_id']);
        $movie->slide = $data['slide_val'];
        $movie->save();
    }

    public function update_image_movie_ajax (Request $request) {
        $get_image =$request->file('file');
        $movie_id = $request->movie_id;

        if($get_image) {
            $movie = Movie::find($movie_id);
            unlink('uploads/movie/'.$movie->image);
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie->image = $new_image;
            $movie->save();
        }
    }

    public function watch_video (Request $request) {
        $data = $request->all();
        $movie = Movie::find($data['movie_id']);
        $video = Episode::where('movie_id',$data['movie_id'])->where('episode',$data['episode_id'])->first();
        $output['video_title'] = $movie->title.'- tập '.$video->episode;
        $output['video_desc'] = $movie->description;
        $output['video_link'] = $movie->linkphim;
        echo json_encode($output);
    }

    
    
}
