<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Movie_Genre;
use App\Models\LinkMovie;
use App\Models\Episode;
use App\Models\Rating;
use App\Models\Blog;
use App\Models\Movie_vip;
use App\Models\Episode_vip;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\vnpay;
use App\Models\User;
use Carbon\Carbon;
use App\Models\History_movie;
use Illuminate\Support\Facades\Auth;




class PageController extends Controller
{
    public function getGioithieu()
    {
        return view('pages.gioithieu');
    }

    public function getGoiphim($id)
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/goiphim_thanhtoan.css';


        $user = User::find($id);

    if ($user) {
        $user->removeRole('userfree'); // Xóa vai trò cũ
        $user->assignRole('uservip'); // Gán vai trò mới

        // Kiểm tra thời gian hết hạn hiện tại và thêm 3 tháng
        $currentEndDate = $user->vip_end_date;
        $newEndDate = $currentEndDate ? Carbon::parse($currentEndDate)->addMonths(3) : Carbon::now()->addMonths(3);

        $user->vip_end_date = $newEndDate; // Cập nhật thời gian hết hạn VIP
        $user->save(); // Lưu thông tin người dùng
    }
        return view('pages.goiphim', compact(
            'customCss',
            'category',
            'country',
            'genre'
        ));
    }
    public function getGoiphim_thanhtoan()
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/goiphim_thanhtoan.css';

        Config::set('vnp_Amount', 'thank toán thành công');

        if (isset($_GET['vnp_Amount'])) {
            $data_vnpay = new vnpay();
            $data_vnpay->vnp_Amount = $_GET['vnp_Amount'];
            $data_vnpay->vnp_BankCode = $_GET['vnp_BankCode'];
            $data_vnpay->vnp_BankTranNo = $_GET['vnp_BankTranNo'];
            $data_vnpay->vnp_CardType = $_GET['vnp_CardType'];
            $data_vnpay->vnp_PayDate = $_GET['vnp_PayDate'];
            $data_vnpay->vnp_ResponseCode = $_GET['vnp_ResponseCode'];
            $data_vnpay->vnp_TransactionNo = $_GET['vnp_TransactionNo'];
            $data_vnpay->vnp_TransactionStatus = $_GET['vnp_TransactionStatus'];
            $data_vnpay->vnp_TxnRef = $_GET['vnp_TxnRef'];
            $data_vnpay->vnp_SecureHash = $_GET['vnp_SecureHash'];
            $data_vnpay ->save();
        }
        return view('pages.goiphim_thanhtoan', compact(
            'customCss',
            'category',
            'country',
            'genre'
        ));
    }

    public function search()
    {
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            //điền kiện
            $category = Category::orderBy('id','DESC') ->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
            $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $movie = Movie::where('title','LIKE','%'.$search.'%')->orderBy('ngay_cap_nhap','DESC')->paginate(40);
        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);
        return view('pages.tim_kiem', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'search',
            'top_view',
            'movie_phimbo',
            'movie_phimle'
        ));
        }else {
            return redirect()->route('pages.trangchu');
        }
        
    }

    public function getTrangchu()
    {
        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('position','ASC')->get();
        $slide = Movie::withCount('episode')->with('country','genre','category','movie_genre')->where('slide',1)->where('status',1)->orderBy('ngay_cap_nhap','DESC')->get();
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $category_home = Category::with(['movie'=> function($q) {$q->withCount('episode');}])->where('status',1)->orderBy('position','ASC') ->get();
        $movie_vip = Movie_vip::withCount('episode')->with('country','genre','category')->where('status',1)->orderBy('id','DESC')->get();


        $user_id = Auth::id();
        $history_movie = History_movie::with('Movie', 'Movie_vip', 'episode')->where('user_id', $user_id)
        ->orderBy('id', 'DESC')
        ->select('movie_id') // Chỉ chọn trường movie_id
        ->distinct() // Loại bỏ các bản ghi trùng lặp
        ->get();
   
        return view('pages.trangchu',compact(
            'category',
            'genre',
            'country',
            'category_home',
            'phimhot',
            'slide',
            'movie_vip',
            'history_movie',
        ));
    }

    public function getChitiet($slug)
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/chitiet.css';
        $movie = Movie::with('country','genre','category')->withCount('episode')->where('slug',$slug)->first();
        $movie_related = Movie::with('country','genre','category','movie_genre')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movie_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('id','DESC')->take(3)->get();

        $rating = Rating::where('movie_id',$movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id',$movie->id)->count();

        $movie_full = Episode::with('movie')->where('movie_id', $movie->id)->where('episode', 'Full')->take(1)->first();
        $blog_news = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->get();
        return view('pages.chitiet', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'movie_tapdau',
            'rating',
            'count_total',
            'movie_full',
            'blog_news'
        ));
    }

    public function getChitiet_vip($slug)
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/chitiet.css';

        $movie = Movie_vip::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie_vip::with('country','genre','category','movie_genre')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movie_tapdau = Episode_vip::with('movie_vip')->where('movie_vip_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $episode = Episode_vip::with('movie_vip')->where('movie_vip_id',$movie->id)->orderBy('id','DESC')->take(3)->get();

        return view('pages.chitiet_vip', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'movie_tapdau',
        ));
    }

    public function getXemphim_vip($slug,$tap,$server_active)
    {

        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/xemphim.css';
        $movie = Movie_vip::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie_vip::with('country','genre','category','movie_genre','episode')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        if(isset($tap)) {
            $tapphim = $tap;
            $tapphim = substr($tap,4,1);
            $episode = Episode_vip::where('movie_vip_id',$movie->id)->where('episode',$tapphim)->first();
        }else {
            $tapphim =1;
            $episode = Episode_vip::where('movie_vip_id',$movie->id)->where('episode',$tapphim)->first();
        }

        $server =LinkMovie::orderBy('id','ASC')->get();
        $episode_movie =Episode_vip::where('movie_vip_id',$movie->id)->get()->unique('server');
        $episode_list =Episode_vip::where('movie_vip_id',$movie->id)->orderBy('episode','ASC')->get();


        // Lưu lịch sử film
        if (Auth::check()) {
            $user = Auth::user();
            if($user->hasRole('uservip')) {
                $userId = Auth::id();
                $movieId = $movie->id;
                $episodeId =  $episode->id;
                $watchedAt = Carbon::now('Asia/Ho_Chi_Minh'); // Thời gian xem
                $existingHistory = History_movie::where('user_id', $userId)
                ->where('episode_id', $episodeId)
                ->exists();
                if($existingHistory) {
                History_movie::create([
                    'user_id' => $userId,
                    'movie_id' => $movieId,
                    'episode_id' => $episodeId,
                    'ngay_tao' => $watchedAt,
                    'ngay_cap_nhat' => $watchedAt,
                ]);
            }
            }
        }

        
        return view('pages.xemphim_vip', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'tapphim',
            'server',
            'episode_movie',
            'episode_list',
            'server_active'
        ));
    }
    // public function add_rating (Request $request) {
    //     $data = $request->all();
    //     $ip_address = $request->ip();
    //     $rating_count= Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
    //     if($rating_count > 0) {
    //         echo 'exit';
    //     }else {
    //         $rating = new Rating();
    //         $rating->rating = $data['index'];
    //         $rating->movie_id = $data['movie_id'];
    //         $rating->ip_address = $ip_address;
    //         $rating->save();
    //         echo'done';
    //     }
    // }       

    public function getXemphim($slug,$tap,$server_active)
    {

        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/xemphim.css';
        $movie = Movie::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie::with('country','genre','category','movie_genre','episode')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();

        
        if ($tap === 'tap-Full') {
            $tapphim = 1;
            $episode = Episode::where('movie_id', $movie->id)
                ->where('episode', '"Full"')
                ->first();

        }
         else {
            $tapphim = substr($tap, strrpos($tap, '-') + 1);
            $episode = Episode::where('movie_id', $movie->id)
                ->whereJsonContains('episode', $tapphim)
                ->first();
        }


        $server =LinkMovie::orderBy('id','ASC')->get();
        $episode_movie =Episode::where('movie_id',$movie->id)->get()->unique('server');
        $episode_list =Episode::where('movie_id',$movie->id)->orderBy('id','ASC')->get();

        // Lưu lịch sử film
        if (Auth::check() && $episode) {
            $userId = Auth::id();
            $movieId = $movie->id;
            $episodeId =  $episode->id;
            $watchedAt = Carbon::now('Asia/Ho_Chi_Minh'); // Thời gian xem
            $existingHistory = History_movie::where('user_id', $userId)
            ->where('episode_id', $episodeId)
            ->exists();
            History_movie::where('user_id', $userId)
            ->where('movie_id', $movieId)
            ->where('ngay_tao', '<', Carbon::now('Asia/Ho_Chi_Minh')->subMonth()) // Filter records older than a month
            ->delete();
            if( !$existingHistory ) {
            History_movie::create([
                'user_id' => $userId,
                'movie_id' => $movieId,
                'episode_id' => $episodeId,
                'ngay_tao' => $watchedAt,
                'ngay_cap_nhat' => $watchedAt,
            ]);
        }
        }

        return view('pages.xemphim', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'tapphim',
            'server',
            'episode_movie',
            'episode_list',
            'server_active'
        ));
    }

    public function getDanhmMuc($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $cate_slug = Category::where('slug',$slug) ->first();
        $movie = Movie::where('category_id', $cate_slug->id)->withCount('episode')->orderBy('ngay_cap_nhap','DESC')->paginate(10);

        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        return view('pages.the_loai.danhmuc', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'cate_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle'
        ));
    }

    public function getTheloai($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
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
        $movie = Movie::whereIn('id', $many_genre)->withCount('episode')->orderBy('ngay_cap_nhap','DESC')->paginate(40); 

        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);
        return view('pages.the_loai.theloai', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'gen_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle'
        ));
    }

    public function getQuocgia($slug)
    {
        //điền kiện
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $coun_slug = Country::where('slug',$slug) ->first();
        //Điều kiện lấy film
        $movie = Movie::where('country_id', $coun_slug->id)->withCount('episode')->orderBy('ngay_cap_nhap','DESC')->paginate(40); 

        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);
        return view('pages.the_loai.quocgia', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'coun_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle'
        ));
    }

    public function getBlog()
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $movie_related = Movie::with('country','genre','category','movie_genre','episode')->orderBy(DB::raw('RAND()'))->get();
        $blog = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1) ->first();
        $list_blog = Blog::orderBy('id','DESC')->where('status',1)->get();
        $blog_news = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->get();
        $review = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->where('review',1)->get();
        $customCss = 'css/blog.css';
        return view('pages.blog',compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie_related',
            'blog',
            'list_blog',
            'blog_news',
            'review'
        ));
    }

    public function getBlog_review($slug)
    {
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();
        $blog = Blog::with('genre')->where('slug',$slug)->first();
        $blog_related = Blog::with('genre')->where('genre_id',$blog->genre->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $customCss = 'css/blog-review.css';
        return view('pages.blog_review',compact(
            'customCss',
            'category',
            'genre',
            'country',
            'blog',
            'blog_related'
        ));
    }


public function loc_phim() {
    
    $customCss = 'css/tong-the-loai.css';

    $sapxep_get = $_GET['order'];
    $genre_get = $_GET['genre'];
    $country_get = $_GET['country'];
    $year_get = $_GET['year'];

    if($sapxep_get== '' && $genre_get=='' && $country_get=='' && $year_get=='' ) {
        // $country_slug = country::where('slug',$slug) ->first();
        // $movie = Movie::where('country_id', $country_slug->id )->orderBy('ngaycapnhat','DESC')->paginate(40);
        return redirect()->back();
    }else {
        $category = Category::orderBy('id','DESC') ->get();
        $genre = Genre::orderBy('id','DESC') ->get();
        $country = Country::orderBy('id','DESC') ->get();

        $movie = Movie::withCount('episode');
        if($genre_get) {
            $movie = $movie->Where('genre_id','=',$genre_get);
        }elseif($country_get) {
            $movie = $movie->Where('country','=',$country_get);
        }elseif($year_get) {
            $movie = $movie->Where('nam_phim','=',$year_get);
        }elseif($sapxep_get) {
            $movie = $movie->Where('title','ASC');
        }

        $movie = $movie->orderBy('ngay_cap_nhap','DESC')->paginate(40);;
        return view('pages.the_loai.locphim', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
        ));
        
    }

    
}
}
