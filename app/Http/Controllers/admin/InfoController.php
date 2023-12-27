<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $list = info::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.info.index',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info = new info();
        $info->title = $request->title;
        $info->description = $request->description;

        $get_image = $request ->file('logo');
        if($get_image) {
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/logo',$new_image);
            $info->logo = $new_image;
        }

        $get_image1 = $request ->file('logo_vip');
        if($get_image1) {
            $get_name_image = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/logo',$new_image);
            $info->logo_vip = $new_image;
        }


        $info->save();
        return redirect()->back()->with('success', 'Đã thêm thành công');
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
        $info = info::find($id);
        $list = info::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.info.index',compact('list','info'))->with('success', 'Bạn đã thêm thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info = info::find($id);
        $info->title = $request->title;
        $info->description = $request->description;

        $get_image = $request ->file('image');
        if($get_image) {
            if (!empty ($info->logo)) {
                unlink('uploads/logo/'.$info->logo);
            }
            $get_name_image = $get_image->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image->move('uploads/logo',$new_image);
            $info->logo = $new_image;
        }

        $get_image1 = $request ->file('logo_vip');
        if($get_image1) {
            if (!empty ($info->logo_vip)) {
                unlink('uploads/logo/'.$info->logo_vip);
            }
            $get_name_image = $get_image1->getClientOriginalName(); //lấy tên hình ảnh vd như hinhanh1.jpg
            $name_image = current(explode('.',$get_name_image)); //tách dấu chấm ra để làm chuõi vd như [0]hinhanh1 . [1]jpg
            $new_image =  $name_image.rand(0,9999).'.'.$get_image1->getClientOriginalExtension(); //random 4 số khác nhau để tránh bị trùng hình ảnh ví dụ hinhanh1234.jpg
            $get_image1->move('uploads/logo',$new_image);
            $info->logo_vip = $new_image;
        }
        $info->save();
        return redirect()->route('info.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $info = info::find($id);
        if(file_exists('uploads/logo/'.$info->logo)){
            unlink('uploads/logo/'.$info->logo);
        }

        if(file_exists('uploads/logo/'.$info->logo_vip)){
            unlink('uploads/logo/'.$info->logo_vip);
        }

        $info->delete();
        return redirect()->back()->with('success', 'Bạn đã xóa và cập nhật ID thành công');
    } 

}
