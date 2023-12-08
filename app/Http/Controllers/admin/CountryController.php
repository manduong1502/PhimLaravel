<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CountryRequest;
use COM;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $list = Country::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.country.form',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return  view('admin.pagesadmin.country.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryRequest $request)
    {
        $country = new Country();
        $country->title = $request->title;
        $country->slug = $request->slug;
        $country->status = $request->status;
        $nextPosition = Country::max('position') + 1;
        $country->position = $nextPosition;
        $country->save();
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
        $country = Country::find($id);
        $list = Country::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.country.index',compact('list','country'))->with('success', 'Bạn đã cập nhập thành công');;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::find($id);
        $country->title = $request->title;
        $country->slug = $request->slug;
        $country->status = $request->status;
        $country->save();
        return redirect()->route('country.index')->with('success', 'Bạn đã cập nhập thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $country = Country::find($id);
    if ($country) {
        $country->delete();

        // Lấy danh sách các bản ghi còn lại theo ID tăng dần
        $categories = country::orderBy('id', 'asc')->get();
        $newId = 1;

        // Cập nhật lại giá trị ID cho từng bản ghi
        foreach ($categories as $country) {
            $country->id = $newId;
            $country->save();
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
                $country = Country::find($value);
                $country->position = $key;
                $country->save();
        }
    }
}
