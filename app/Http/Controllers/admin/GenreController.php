<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Genre;
use App\Http\Requests\GenreRequest;
class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Genre::orderBy('id','ASC')->get();
        return  view('admin.pagesadmin.genre.form',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.pagesadmin.genre.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenreRequest $request)
    {
        $genre = new Genre();
        $genre->title = $request->title;
        $genre->slug = $request->slug;
        $genre->status = $request->status;
        
        $nextPosition = Genre::max('position') + 1;
        $genre->position = $nextPosition;
        $genre->save();
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
        $genre = Genre::find($id);
        $list = Genre::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.genre.index',compact('list','genre'))->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $genre = Genre::find($id);
        $genre->title = $request->title;
        $genre->slug = $request->slug;
        $genre->status = $request->status;
        $genre->save();
        return redirect()->route('genre.index')->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $genre = Genre::find($id);
    if ($genre) {
        $genre->delete();

        // Lấy danh sách các bản ghi còn lại theo ID tăng dần
        $categories = genre::orderBy('id', 'asc')->get();
        $newId = 1;

        // Cập nhật lại giá trị ID cho từng bản ghi
        foreach ($categories as $genre) {
            $genre->id = $newId;
            $genre->save();
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
                $genre = Genre::find($value);
                $genre->position = $key;
                $genre->save();
        }
    }
}
