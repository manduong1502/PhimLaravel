<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
class MovieController extends Controller
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
        $category = Category::pluck('title','id');
        $country = Country::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list = Movie::with('category','country','genre')->orderBy('id','DESC')->get();
        return  view('admin.pagesadmin.movie',compact(
            'list',
            'country',
            'genre',
            'category',
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $movie = new Movie();
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->status = $request->status;
        $movie->phim_hot = $request->phim_hot;

        $movie->category_id = $request->category_id;
        $movie->genre_id = $request->genre_id;
        $movie->country_id = $request->country_id;

        //thêm hình ảnh
        $get_image = $request ->file('image');
       

        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/movie',$new_image);
            $movie->image = $new_image;
        }

        $movie->save();
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
        $movie = Movie::find($id);
        if (!$movie) {
            return redirect()->route('movie.create')->with('error', 'Không tìm thấy bộ phim.');
        }
        return  view('admin.pagesadmin.movie',compact(
            'list',
            'country',
            'genre',
            'category',
            'movie'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $movie = Movie::find($id);
        $movie->title = $request->title;
        $movie->slug = $request->slug;
        $movie->description = $request->description;
        $movie->status = $request->status;
        $movie->phim_hot = $request->phim_hot;
        $movie->category_id = $request->category_id;
        $movie->genre_id = $request->genre_id;
        $movie->country_id = $request->country_id;

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

        $movie->save();
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
