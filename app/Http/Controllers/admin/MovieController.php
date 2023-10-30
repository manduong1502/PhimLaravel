<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Movie::with('category','genre','country')->orderBy('id','DESC')->get();
        $path = public_path()."/json/";
        if(!is_dir($path)) {
            mkdir($path,0777,true);
        }
        File::put($path. 'movies.json',json_encode($list));
        return redirect()->route('movie.create');
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
    $list_genre = Genre::all();
    $list = Movie::with('category', 'country', 'genre', 'movie_genre')->orderBy('id', 'DESC')->get();
    
    // Đảm bảo biến movie_genre đã được định nghĩa và cung cấp nó trong mảng compact
    $movie_genre = Genre::pluck('title', 'id');
    
    return view('admin.pagesadmin.movie', compact(
        'list',
        'country',
        'genre',
        'category',
        'list_genre',
        'movie_genre' // Thêm biến movie_genre vào danh sách các biến cần truyền vào view
    ));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->all();
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->so_tap = $request->so_tap;
        $movie->description = $request->description;
        $movie->daodien = $request->daodien;
        $movie->status = $request->status;
        $movie->slide = $request->slide;
        $movie->phim_hot = $request->phim_hot;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');
        
        foreach($data['genre'] as $key => $gen) {
            $movie -> genre_id = $gen[0];
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
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list = Movie::with('category','country','genre')->orderBy('id','DESC')->get();
        $list_genre = Genre::all();
        $movie = Movie::find($id);
        $movie_genre = $movie->movie_genre;
        if (!$movie) {
            return redirect()->route('movie.create')->with('error', 'Không tìm thấy bộ phim.');
        }
        return  view('admin.pagesadmin.movie',compact(
            'list',
            'country',
            'genre',
            'category',
            'movie',
            'list_genre',
            'movie_genre'
        ));
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
        $movie->daodien = $request->daodien;
        $movie->status = $request->status;
        $movie->slide = $request->slide;
        $movie->phim_hot = $request->phim_hot;
        $movie->category_id = $request->category_id;
        $movie->country_id = $request->country_id;
        $movie->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');

        foreach($data['genre'] as $key => $gen) {
            $movie -> genre_id = $gen[0];
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
        return redirect()->route('movie.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie = Movie::find($id);
        if (!empty ($movie->image)) {
            unlink('uploads/movie/'.$movie->image);
        }
        $movie = Movie::find($id);
        if (!empty ($movie->image1)) {
            unlink('uploads/movie/'.$movie->image1);
        }
        //Nhiều thể loại
        //Điều kiện lấy film
        Movie_Genre::whereIn('movie_id', [$movie->id])->delete(); 
       
        $movie->delete();
        return redirect()->back();
    }

    public function resorting (Request $request) {
        $data = $request->all();

            foreach($data['array_id'] as $key => $value) {
                $movie = Movie::find($value);
                $movie->position = $key;
                $movie->save();
        }
    }
}
