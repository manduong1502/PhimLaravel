<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Category::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.category.form',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.pagesadmin.category.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        $category = new Category();
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $nextPosition = Category::max('position') + 1;
        $category->position = $nextPosition;
        $category->save();
        return redirect()->back()->with('success', 'Bạn đã thêm thành công');
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
        $category = Category::find($id);
        $list = Category::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.category.index',compact('list','category'))->with('success', 'Bạn đã thêm thành công');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::find($id);
        $category->title = $request->title;
        $category->slug = $request->slug;
        $category->status = $request->status;
        $category->save();
        return redirect()->route('category.index')->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $category = Category::find($id);
    if ($category) {
        $category->delete();

        // Lấy danh sách các bản ghi còn lại theo ID tăng dần
        $categories = Category::orderBy('id', 'asc')->get();
        $newId = 1;

        // Cập nhật lại giá trị ID cho từng bản ghi
        foreach ($categories as $category) {
            $category->id = $newId;
            $category->save();
            $newId++;
        }

        return redirect()->back()->with('success', 'Bạn đã xóa và cập nhật ID thành công');
    } else {
        return redirect()->back()->with('error', 'Không tìm thấy bản ghi');
    }
}

    public function resorting (Request $request) {
        $data = $request->all();

            foreach($data['array_id'] as $key => $value) {
                $category = Category::find($value);
                $category->position = $key;
                $category->save();
        }
    }
}
