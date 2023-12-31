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
use App\Models\Info;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\vnpay;
use App\Models\User;
use Carbon\Carbon;
use App\Models\History_movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




class PageController extends Controller
{
    public function getGioithieu()
    {   
        $info = Info::find(1);
        $meta_title = $info->title;
        $meta_description = $info->description;
        return view('pages.gioithieu',compact(
            'meta_title',
            'meta_description'
        ));
    }

    public function getGoiphim($id)
    {
        $meta_title = "Gói phim | Cosmic";
        $meta_description = "Giao diện chinh của web film cosmic";
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/goiphim_thanhtoan.css';
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        


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
            'genre',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
    }
    public function getGoiphim_thanhtoan()
    {
        $meta_title = "Thanh toán | Cosmic";
        $meta_description = "Giao diện chinh của web film cosmic";
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/goiphim_thanhtoan.css';
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 

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
            'genre',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
    }

    public function search()
    {
        $meta_title = "Tìm kiếm | Cosmic";
        $meta_description = "Giao diện chinh của web film cosmic";
        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            //điền kiện
            $category = Category::orderBy('id','DESC') ->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
            $country = Country::orderBy('id','DESC')->where('status',1) ->get();
            $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
            $thong_tin_user = $user->remember_token; 
        //css
        $customCss = 'css/tong-the-loai.css';
        //điều kiện slug
        $movie = Movie::withCount('episode')->where('title','LIKE','%'.$search.'%')->orderBy('ngay_cap_nhap','DESC')->paginate(40);
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
            'movie_phimle',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
        }else {
            return redirect()->route('pages.trangchu');
        }
        
    }

    public function getTrangchu()
    {
        $meta_title = "Trang chủ | Cosmic";
        $meta_description = "Giao diện chinh của web film cosmic";
        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('position','DESC')->get();
        $slide = Movie::withCount('episode')->with('country','genre','category','movie_genre','movie_actor')->where('slide',1)->where('status',1)->orderBy('ngay_cap_nhap','DESC')->get();
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $category_home = Category::with(['movie'=> function($q) {$q->withCount('episode');}])->where('status',1)->orderBy('position','ASC') ->get();
        $movie_vip = Movie_vip::withCount('episode')->with('country','genre','category')->where('status',1)->orderBy('id','DESC')->get();


        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token;        
        $history_movie = History_movie::with(['movie'=> function($q) {$q->withCount('episode');}], 'Movie_vip')->where('user_id', $user)
        ->orderBy('id', 'DESC')
        ->select('movie_id') // Chỉ chọn trường movie_id
        ->distinct() // Loại bỏ các bản ghi trùng lặp
        ->get();

        $customCssArr = ['css/responsive_trang_chu.css'];
   
        return view('pages.trangchu',compact(
            'category',
            'genre',
            'country',
            'category_home',
            'phimhot',
            'slide',
            'movie_vip',
            'history_movie',
            'meta_title',
            'meta_description',
            'thong_tin_user',
            'customCssArr'
        ));
    }

    public function getChitiet($slug)
    {
        
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $movie = Movie::with('category', 'country', 'genre', 'movie_genre','movie_actor','actor')->withCount('episode')->where('slug',$slug)->first();
        $movie_related = Movie::with('category','country','genre','category','movie_genre')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movie_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('id','DESC')->take(3)->get();

        $rating = Rating::where('movie_id',$movie->id)->avg('rating');
        $rating = round($rating);
        $count_total = Rating::where('movie_id',$movie->id)->count();

        $movie_full = Episode::with('movie')->where('movie_id', $movie->id)->where('episode', 'Full')->take(1)->first();

        $blog_news = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->get();

        $meta_title = "Chi tiết ".$movie ->title ." | Cosmic";
        $meta_description = $movie->desctiption;

        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 

        $customCssArr = [
            'css/chitiet.css',
            'css/responsive_chi_tiet.css'
        ];
        return view('pages.chitiet', compact(
            'customCssArr',
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
            'blog_news',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
    }

    public function getChitiet_vip($slug)
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCss = 'css/chitiet.css';

        $movie = Movie_vip::with('category', 'country', 'genre', 'movie_genre','movie_actor','actor')->where('slug',$slug)->first();
        $movie_related = Movie_vip::with('category', 'country', 'genre', 'movie_genre','movie_actor','actor')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $movie_tapdau = Episode_vip::with('movie_vip')->where('movie_vip_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        $episode = Episode_vip::with('movie_vip')->where('movie_vip_id',$movie->id)->orderBy('id','DESC')->take(3)->get();

        $meta_title = "Chi tiết  ".$movie ->title ." | Cosmic";
        $meta_description = $movie->desctiption;
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        return view('pages.chitiet_vip', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'movie_related',
            'episode',
            'movie_tapdau',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
    }

    public function getXemphim_vip($slug,$tap,$server_active)
    {

        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $customCssArr = ['css/xemphim.css'];
        $movie = Movie_vip::with('country','genre','category')->where('slug',$slug)->first();
        $movie_related = Movie_vip::withCount('episode')->with('country','genre','category','movie_genre','episode')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
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


        $meta_title = "Xem phim ".$movie ->title ." | Cosmic";
        $meta_description = $movie->desctiption;
        
        return view('pages.xemphim_vip', compact(
            'customCssArr',
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
            'server_active',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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
        $movie_related = Movie::withCount('episode')->with('country','genre','category','movie_genre','episode')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        
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
        $episode_list = Episode::where('movie_id', $movie->id)
    ->orderBy('id', 'ASC')
    ->get();

// Lấy thông tin về số thứ tự các tập phim
$episodeNumbers = $episode_list->pluck('episode')->toArray();

// Kiểm tra xem thứ tự hiện tại của các tập phim có ngược hay không
$isReversed = $episodeNumbers === array_reverse($episodeNumbers);

// Nếu thứ tự hiện tại là ngược, sắp xếp lại mảng theo thứ tự tăng dần
$episode_list = $isReversed ? $episode_list->sortBy('episode')->values() : $episode_list;


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
            ->where('episode_id',$episodeId)
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

        $meta_title = "Xem phim ".$movie ->title ." | Cosmic";
        $meta_description = $movie->desctiption;

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
            'server_active',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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
        $movie = Movie::withCount('episode')->where('category_id', $cate_slug->id)->withCount('episode')->orderBy('ngay_cap_nhap','DESC')->paginate(10);

        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $meta_title = "Danh mục ".$cate_slug ->title ." | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";

        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 

        return view('pages.the_loai.danhmuc', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'cate_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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

        $meta_title = "Thể loại ".$gen_slug ->title ." | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        return view('pages.the_loai.theloai', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'gen_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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
        $movie = Movie::withCount('episode')->where('country_id', $coun_slug->id)->withCount('episode')->orderBy('ngay_cap_nhap','DESC')->paginate(40); 

        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);
        $meta_title = "Quốc gia ".$coun_slug ->title ." | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        return view('pages.the_loai.quocgia', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'coun_slug',
            'movie',
            'top_view',
            'movie_phimbo',
            'movie_phimle',
            'movie_phimle',
            'meta_title',
            'meta_description',
            'thong_tin_user'
        ));
    }

    public function getBlog()
    {
        $category = Category::orderBy('id','DESC') ->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->where('status',1) ->get();
        $country = Country::orderBy('id','DESC')->where('status',1) ->get();
        $movie_related = Movie::withCount('episode')->with('country','genre','category','movie_genre','episode')->orderBy(DB::raw('RAND()'))->get();
        $blog = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1) ->first();
        $list_blog = Blog::orderBy('id','DESC')->where('status',1)->get();
        $blog_news = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->get();
        $review = Blog::orderBy('ngay_cap_nhat','DESC')->where('status',1)->where('review',1)->get();
        $customCss = 'css/blog.css';
        $meta_title = "Bài viết | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        return view('pages.blog',compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie_related',
            'blog',
            'list_blog',
            'blog_news',
            'review',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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
        $meta_title = "Bài viết ".$blog ->title ." | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 
        return view('pages.blog_review',compact(
            'customCss',
            'category',
            'genre',
            'country',
            'blog',
            'blog_related',
            'meta_title',
            'meta_description',
            'thong_tin_user'
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
        $top_view = Movie::whereNotNull('view')->orderBy('view','desc')->take(10)->get();
        $user = Auth::user(); // Lấy đối tượng người dùng đã xác thực
        $thong_tin_user = $user->remember_token; 

        $movie_phimbo = Movie::where('type','series')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);

        $movie_phimle = Movie::where('type','single')->whereNotNull('view')->orderBy('view','desc')->get()->take(10);
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

        $movie = $movie->orderBy('ngay_cap_nhap','DESC')->paginate(40);
        $meta_title = "Lọc phim | Cosmic";
        $meta_description ="Giao diện chinh của web film cosmic";
        return view('pages.the_loai.locphim', compact(
            'customCss',
            'category',
            'genre',
            'country',
            'movie',
            'meta_title',
            'meta_description',
            'top_view',
            'movie_phimbo',
            'movie_phimle',
            'thong_tin_user'
        ));
        
    }
    
}


public function thongtin($thong_tin_user) {
    $category = Category::orderBy('id','DESC')->get();
    $genre = Genre::orderBy('id','DESC')->get();
    $country = Country::orderBy('id','DESC')->get();
    // Sử dụng trường khác để tìm kiếm người dùng, ví dụ: id
    $user = User::where('remember_token', $thong_tin_user)->first();
    $meta_title = "Thong tin | Cosmic";
    $meta_description ="Giao diện chinh của web film cosmic";
    
    return view('pages.thongtin', compact(
        'category',
        'genre',
        'country',
        'user',
        'meta_title',
        'meta_description',
        'thong_tin_user'
    ));
}

public function thongtin_post(Request $request, $id)
    {
        $user = User::find($id);
    $user->username = $request->username;
    $user->email = $request->email;
    
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
        $user->save();
        return redirect()->back()->with('success','Bạn đã sửa thành công');
    }
}

