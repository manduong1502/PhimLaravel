<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;



class PageController extends Controller
{
    public function getGioithieu()
    {
        return view('pages.gioithieu');
    }

    public function getTrangchu()
    {
        $phimhot = Movie::where('phim_hot',1)->where('status',1)->get();
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $category_home = Category::with('movie')->orderBy('id','DESC') ->get();
        return view('pages.trangchu',compact(
            'category',
            'genre',
            'country',
            'category_home',
            'phimhot'
        ));
    }

    public function getChitiet()
    {
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $customCss = 'css/chitiet.css';
        return view('pages.chitiet', compact(
            'customCss',
            'category',
            'genre',
            'country'
        ));
    }

    public function getXemphim()
    {
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $customCss = 'css/xemphim.css';
        return view('pages.xemphim', compact(
            'customCss',
            'category',
            'genre',
            'country'
        ));
    }

    public function getDanhmMuc($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $cate_slug = Category::where('slug',$slug) ->first();
        $movie = Movie::where('category_id', $cate_slug->id)->paginate(40);
        return view('pages.the_loai.danhmuc', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'cate_slug',
            'movie',
        ));
    }

    public function getTheloai($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug  
        $gen_slug = Genre::where('slug',$slug) ->first();
        //Điều kiện lấy film
        $movie = Movie::where('genre_id', $gen_slug->id)->paginate(40); 
        return view('pages.the_loai.theloai', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'gen_slug',
            'movie'
        ));
    }

    public function getQuocgia($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $coun_slug = Country::where('slug',$slug) ->first();
        //Điều kiện lấy film
        $movie = Movie::where('country_id', $coun_slug->id)->paginate(40); 
        return view('pages.the_loai.quocgia', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'coun_slug',
            'movie'
        ));
    }

    // public function getBlog()
    // {
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCss = 'css/blog.css';
    //     return view('pages.blog',compact(
    //         'customCss',
    //         'category',
    //         'genre',
    //         'country'
    //     ));
    // }

    // public function getBlog_review()
    // {
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCss = 'css/blog-review.css';
    //     return view('pages.blog_review',compact(
    //         'customCss',
    //         'category',
    //         'genre',
    //         'country'
    //     ));
    // }


    // public function getchoghe()
    // {
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCssArr = [
    //         '/css/datve.css',
    //         '/css/chon-ghe-film.css',
    //     ];
    //     $customJsArr = [
    //         '/js/chair.js'
    //     ];
    //     return view('datve.datghe',compact(
    //         'customCssArr',
    //         'customJsArr',
    //         'category',
    //         'genre',
    //         'country'
    //     ));
    // }

    // public function getdatbapnuoc(){
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCssArr = [
    //         '/css/datve.css',
    //         '/css/datve-bap-nuoc.css',
            
    //     ];
    //     $customJsArr = [
    //         '/js/datve.js'
    //     ];
    //     return view('datve.datbapnuoc',compact(
    //         'customCssArr',
    //         'customJsArr'
    //     ));
    // }

    // public function getthanhtoan()
    // {   
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCssArr = [
    //         '/css/datve.css',
    //         '/css/datve-thanhtoan.css'
    //     ];
    //     return view('datve.thanhtoan',compact(
    //         'customCssArr',
    //         'category',
    //         'genre',
    //         'country'
    //     ));
    // }


    // public function getthongtinve()
    // {
    //     $category = Category::orderBy('id','DESC') ->get();
    //     $genre = Genre::orderBy('id','DESC') ->get();
    //     $country = Country::orderBy('id','DESC') ->get();
    //     $customCssArr = [
    //         '/css/datve.css',
    //         '/css/thong-tin-ve.css'
    //     ];
    //     return view('datve.thongtinve',compact(
    //         'customCssArr',
    //         'category',
    //         'genre',
    //         'country'
    //     ));
    // }
}
