<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;



class PageController extends Controller
{
    public function getGioithieu()
    {
        return view('pages.gioithieu');
    }

    public function search()
    {
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $movie = Movie::where('title','LIKE','%'.$search.'%')->orderBy('ngay_cap_nhap','DESC')->paginate(40);
        return view('pages.tim_kiem', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'search'
        ));
        }else {
            return redirect()->route('pages.trangchu');
        }
        
    }

    public function getTrangchu()
    {
        $phimhot = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngay_cap_nhap','DESC')->get();
        $slide = Movie::with('country','genre','category','movie_genre')->where('slide',1)->where('status',1)->orderBy('ngay_cap_nhap','DESC')->get();
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $category_home = Category::with('movie')->orderBy('id','DESC') ->get();
        return view('pages.trangchu',compact(
            'category',
            'genre',
            'country',
            'category_home',
            'phimhot',
            'slide',
        ));
    }

    public function getChitiet($slug)
    {
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $customCss = 'css/chitiet.css';
        $movie = Movie::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie::with('country','genre','category','movie_genre')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movie_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('id','DESC')->take(3)->get();
        return view('pages.chitiet', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'movie_tapdau'
        ));
    }

    public function getXemphim($slug,$tap)
    {
        if(isset($tap)) {
            $tapphim = $tap;
        }else {
            $tapphim =1;
        }
        $tapphim = substr($tap,4,1);
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $customCss = 'css/xemphim.css';
        $movie = Movie::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie::with('country','genre','category','movie_genre','episode')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        return view('pages.xemphim', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'tapphim'
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
        $movie = Movie::where('category_id', $cate_slug->id)->orderBy('ngay_cap_nhap','DESC')->paginate(40);
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
        //Nhiều thể loại
        $movie_genre=  Movie_Genre::where('genre_id',$gen_slug->id)->get();
        $many_genre = [];
        foreach($movie_genre as $key => $movi) {
            $many_genre[] = $movi->movie_id;
        }
        //Điều kiện lấy film
        $movie = Movie::whereIn('id', $many_genre)->orderBy('ngay_cap_nhap','DESC')->paginate(40); 
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
        $movie = Movie::where('country_id', $coun_slug->id)->orderBy('ngay_cap_nhap','DESC')->paginate(40); 
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
