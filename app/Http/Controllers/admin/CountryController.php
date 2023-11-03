<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Country;
use App\Http\Requests\CountryRequest;

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
        $list = Country::orderBy('position','ASC')->get();
        return  view('admin.pagesadmin.country.index',compact('list','country'));
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
        return redirect()->route('country.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Country::find($id) -> delete();
        return redirect()->back();
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
