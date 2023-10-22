<?php

namespace App\Http\Controllers;


class PageController extends Controller
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
        $customJsArr = [
            '/js/chair.js'
        ];
        return view('datve.datghe',compact(
            'customCssArr',
            'customJsArr'
        ));
    }

    public function getdatbapnuoc(){
        $customCssArr = [
            '/css/datve.css',
            '/css/datve-bap-nuoc.css'
        ];
        $customJsArr = [
            '/js/datve.js'
        ];
        return view('datve.datbapnuoc',compact(
            'customCssArr',
            'customJsArr'
        ));
    }

    public function getthanhtoan()
    {   
        $customCssArr = [
            '/css/datve.css',
            '/css/datve-thanhtoan.css'
        ];
        return view('datve.thanhtoan',compact('customCssArr'));
    }


    public function getthongtinve()
    {
        $customCssArr = [
            '/css/datve.css',
            '/css/thong-tin-ve.css'
        ];
        return view('datve.thongtinve',compact('customCssArr'));
    }
}
