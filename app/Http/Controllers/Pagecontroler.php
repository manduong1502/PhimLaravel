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
        $customCss = 'css/chitiet.css';
        return view('pages.chitiet',compact('customCss'));
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

    public function getchoghe(){
        return view('datve.datghe');
    }

    public function getdatbapnuoc(){
        return view('datve.datbatnuoc');
    }

    public function getthanhtoan(){
        return view('datve.thanhtoan');
    }

    public function getdatve(){
        return view('datve.dat_ve');
    }

    public function getthongtinve(){
        return view('datve.thongtinve');
    }
}
