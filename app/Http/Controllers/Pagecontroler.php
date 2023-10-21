<?php

namespace App\Http\Controllers;


class Pagecontroler extends Controller
{
    public function getGioithieu()
    {
        return view('pages.gioithieu');
    }

    public function getTrangchu()
    {
        return view('pages.trangchu');
    }

    public function getChitiet()
    {
        $customCss = 'css/chitiet.css';
        return view('pages.chitiet', compact('customCss'));
    }

    public function getXemphim()
    {
        $customCss = 'css/xemphim.css';
        return view('pages.xemphim', compact('customCss'));
    }

    public function getTheloai()
    {
        $customCss = 'css/tong-the-loai.css';
        return view('pages.theloai', compact('customCss'));
    }

    public function getBlog()
    {
        $customCss = 'css/blog.css';
        return view('pages.blog',compact('customCss'));
    }

    public function getBlog_review()
    {
        $customCss = 'css/blog-review.css';
        return view('pages.blog_review',compact('customCss'));
    }


    public function getchoghe()
    {
        $customCssArr = [
            '/css/datve.css',
            '/css/chon-ghe-film.css'
        ];
        return view('datve.datghe',compact('customCssArr'));
    }

    public function getdatbapnuoc()
    {
        return view('datve.datbatnuoc');
    }

    public function getthanhtoan()
    {
        return view('datve.thanhtoan');
    }

    public function getdatve()
    {
        return view('datve.dat_ve');
    }

    public function getthongtinve()
    {
        return view('datve.thongtinve');
    }
}
