<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\movie_vip;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie_Genre;
use App\Models\Episode;
use Illuminate\Support\Facades\File;

use Carbon\Carbon;


class MovieVipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $category = Category::pluck('title', 'id');
        $country = Country::pluck('title', 'id');
        $genre = Genre::pluck('title', 'id');
        $list_genre = Genre::all();
        $list = movie_vip::with('category', 'country', 'genre', 'movie_genre')->withCount('episode')->orderBy('id', 'DESC')->get();
        
        // Đảm bảo biến movie_genre đã được định nghĩa và cung cấp nó trong mảng compact
        $movie_genre = Genre::pluck('title', 'id');
    
            $path = public_path()."/json/";
            if(!is_dir($path)) {
                mkdir($path,0777,true);
            }
            File::put($path. 'movies.json',json_encode($list));
            return view('admin.pagesadmin.movie_vip.form',compact(
            'list',
            'country',
            'genre',
            'category',
            'list_genre',
            'movie_genre'
            ));
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
    $list = movie_vip::with('category', 'country', 'genre', 'movie_genre')->withCount('episode')->orderBy('id', 'DESC')->get();
    
    // Đảm bảo biến movie_genre đã được định nghĩa và cung cấp nó trong mảng compact
    $movie_vip_genre = Genre::pluck('title', 'id');
        return view('admin.pagesadmin.movie_vip.index',compact(
            'category',
            'country',
            'genre',
            'list',
            'list_genre'
            ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data =$request->all();
        $movie_vip_vip = new movie_vip();
        $movie_vip_vip->title = $request->title;
        $movie_vip_vip->slug = $request->slug;
        $movie_vip_vip->so_tap = $request->so_tap;
        $movie_vip_vip->description = $request->description;
        $movie_vip_vip->daodien = $request->daodien;
        $movie_vip_vip->status = $request->status;
        $movie_vip_vip->actor = $request->actor;
        $movie_vip_vip->slide = $request->slide;
        $movie_vip_vip->trailer = $request->trailer;
        $movie_vip_vip->phim_hot = $request->phim_hot;
        $movie_vip_vip->category_id = $request->category_id;
        $movie_vip_vip->country_id = $request->country_id;
        $movie_vip_vip->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $movie_vip_vip->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');
        
        foreach($data['genre'] as $key => $gen) {
            $movie_vip_vip -> genre_id = $gen[0];
        }

        //thêm hình ảnh nhỏ
        $get_image = $request ->file('image');
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie_vip_vip->image = $new_image;
        }

        //thêm hình ảnh lớn
        $get_image1 = $request ->file('image1');
        if($get_image1) {
            $get_name_image1 = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image1 = current(explode('.',$get_name_image1)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image1 =  $name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/movie/imagebig',$new_image1);
            $movie_vip_vip->image1 = $new_image1;
        }

        $movie_vip_vip->save();
        //Thêm nhiêu thể loại cho phim
        $movie_vip_vip->movie_genre()->attach($data['genre']);
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {


    }

    public function showapi()
    {

        return response()->json(movie_vip::paginate());
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list = movie_vip::with('category','country','genre')->withCount('episode')->orderBy('id','DESC')->get();
        $list_genre = Genre::all();
        $movie_vip = movie_vip::find($id);
        $movie_genre = $movie_vip->movie_genre;
        if (!$movie_vip) {
            return redirect()->route('movie.create')->with('error', 'Không tìm thấy bộ phim.');
        }
        return  view('admin.pagesadmin.movie.index',compact(
            'list',
            'country',
            'genre',
            'category',
            'movie',
            'list_genre',
            'movie_genre'
        ))->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data =$request->all();
        $movie_vip = movie_vip::find($id);
        $movie_vip->title = $request->title;
        $movie_vip->slug = $request->slug;
        $movie_vip->so_tap = $request->so_tap;
        $movie_vip->description = $request->description;
        $movie_vip->actor = $request->actor;
        $movie_vip->daodien = $request->daodien;
        $movie_vip->trailer = $request->trailer;
        $movie_vip->status = $request->status;
        $movie_vip->slide = $request->slide;
        $movie_vip->phim_hot = $request->phim_hot;
        $movie_vip->category_id = $request->category_id;
        $movie_vip->country_id = $request->country_id;
        $movie_vip->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');

        foreach($data['genre'] as $key => $gen) {
            $movie_vip -> genre_id = $gen[0];
        }

        //thêm hình ảnh
        $get_image = $request ->file('image');
        if($get_image) {
            if (!empty ($movie_vip->image)) {
                unlink('uploads/movie/'.$movie_vip->image);
            }
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie_vip->image = $new_image;
        }

        //thêm hình ảnh lớn
        $get_image1 = $request ->file('image1');
        if($get_image1) {
            if (!empty ($movie_vip->image1)) {
                unlink('uploads/movie/imagebig/'.$movie_vip->image1);
            }
            $get_name_image1 = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image1 = current(explode('.',$get_name_image1)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image1 =  $name_image1.rand(0,9999).'.'.$get_image1->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/movie/imagebig',$new_image1);
            $movie_vip->image1 = $new_image1;
        }
        $movie_vip->save();
        $movie_vip->movie_genre()->sync($data['genre']);
        return redirect()->route('movie.index')->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movie_vip = movie_vip::find($id);
        if(file_exists('uploads/movie/'.$movie_vip->image)){
            unlink('uploads/movie/'.$movie_vip->image);
        }
        if(file_exists('uploads/movie/'.$movie_vip->image1)){
            unlink('uploads/movie/'.$movie_vip->image1);
        } 
        //Nhiều thể loại
        //Điều kiện lấy film
        Movie_Genre::whereIn('movie_id', [$movie_vip->id])->delete(); 
        Episode::whereIn('movie_id', [$movie_vip->id])->delete(); 
        $movie_vip->delete();
        return redirect()->back()->with('success', 'Bạn đã xóa thành công');;
    }

    public function trangthai_choose_vip (Request $request) {
        $data =$request -> all();
        $movie_vip = movie_vip::find($data['movie_vip_id']);
        $movie_vip->status = $data['trangthai_val_vip'];
        $movie_vip->save();
    }

    public function category_choose_vip (Request $request) {
        $data =$request -> all();
        $movie_vip = movie_vip::find($data['movie_vip_id']);
        $movie_vip->category_id = $data['category_id_vip'];
        $movie_vip->save();
    }

    public function country_choose_vip (Request $request) {
        $data =$request -> all();
        $movie_vip = movie_vip::find($data['movie_vip_id']);
        $movie_vip->country_id = $data['country_id_vip'];
        $movie_vip->save();
    }
}
