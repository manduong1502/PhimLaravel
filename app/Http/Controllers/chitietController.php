<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class chitietController extends Controller
{
    public function index() {
        $config = $this -> config();
        return view("index",compact(
            'config'
        ));
    }

    public function config() {
        return [
            'content'=> 'pages.chitiet',
        ];
    }
}
