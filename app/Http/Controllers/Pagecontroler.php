<?php

namespace App\Http\Controllers;


class Pagecontroler extends Controller
{
    public function getGioithieu(){
        return view('pages.gioithieu');
    }
    public function getTrangchu(){
     return view('pages.trangchu');
    }
    public function getChitiet(){
        return view('pages.chitiet');
    }
    public function getXemphim(){
        return view('pages.xemphim');
    }
     public function getTheloai(){
         return view('pages.theloai');
     }
    public function getBlog(){
        return view('pages.blog');
    }
    public function getBlog_review(){
        return view('pages.blog_review');
    }
}
