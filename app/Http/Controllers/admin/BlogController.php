<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Genre;
use Carbon\Carbon;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Blog::with('genre')->orderBy('id', 'DESC')->get();
        $list_genre = Genre::all();
        $genre = Genre::pluck('title', 'id');
        // Đảm bảo biến blog_genre đã được định nghĩa và cung cấp nó trong mảng compact
        return  view('admin.pagesadmin.blog.form',compact(
            'list',
            'list_genre',
            'genre'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = Blog::with('genre')->orderBy('id', 'DESC')->get();
        $list_genre = Genre::all();
        $genre = Genre::pluck('title', 'id');
        // Đảm bảo biến blog_genre đã được định nghĩa và cung cấp nó trong mảng compact
        return  view('admin.pagesadmin.blog.index',compact(
            'list',
            'list_genre',
            'genre'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->status = $request->status;
        $blog->description = $request->description;
        $blog->genre_id = $request->genre_id;
        $blog->ngay_tao = Carbon::now('Asia/Ho_Chi_Minh');
        $blog->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');

        $get_video = $request ->file('video');
        if($get_video) {
            $get_name_video = $get_video->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_video = current(explode('.',$get_name_video)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_video =  $name_video.rand(0,9999).'.'.$get_video->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_video->move('uploads/video/trailer',$new_video);
            $blog->video = $new_video;
        }
        $blog->save();
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
        $list = Blog::with('genre')->orderBy('id', 'DESC')->get();
        $list_genre = Genre::all();
        $genre = Genre::pluck('title', 'id');
        return  view('admin.pagesadmin.blog',compact('list','list_genre','genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $blog = Blog::find($id);
        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->status = $request->status;
        $blog->status = $request->status;
        $blog->description = $request->description;
        $blog->genre_id = $request->genre_id;
        $blog->ngay_cap_nhap = Carbon::now('Asia/Ho_Chi_Minh');


        //thêm hình ảnh
        $get_video = $request ->file('video');
        if($get_video) {
            if (!empty ($blog->video)) {
                unlink('uploads/video/trailer/'.$blog->video);
            }
            $get_name_video = $get_video->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_video = current(explode('.',$get_name_video)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_video =  $name_video.rand(0,9999).'.'.$get_video->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_video->move('uploads/video/trailer',$new_video);
            $blog->video = $new_video;
        }
        $blog->save();
        return redirect()->route('blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Blog::find($id) -> delete();
        return redirect()->back();
    }

    public function resorting (Request $request) {
        $data = $request->all();

            foreach($data['array_id'] as $key => $value) {
                $blog = blog::find($value);
                $blog->position = $key;
                $blog->save();
        }
    }
}
