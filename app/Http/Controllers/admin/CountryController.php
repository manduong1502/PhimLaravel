<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
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
        $list = Country::all();
        return  view('admin.pagesadmin.country',compact('list'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $country = new Country();
        $country->title = $request->title;
        $country->slug = $request->slug;
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
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
        $country = Country::find($id);
        $list = Country::all();
        return  view('admin.pagesadmin.country',compact('list','country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $country = Country::find($id);
        $country->title = $request->title;
        $country->slug = $request->slug;
        $country->description = $request->description;
        $country->status = $request->status;
        $country->save();
        return redirect()->route('country.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id) -> delete();
        return redirect()->back();
    }
}
