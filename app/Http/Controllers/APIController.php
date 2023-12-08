<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class APIController extends Controller
{
    public function getProducts(){
        $product = Product::all();
        return response() ->json($product);
    }
}
