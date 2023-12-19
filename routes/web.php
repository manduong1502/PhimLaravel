<?php
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\RegisterController;
//Admin Controller
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\MovieController;
use App\Http\Controllers\admin\CountryController;
use App\Http\Controllers\admin\EpisodeController;
use App\Http\Controllers\admin\GenreController;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\LeechMovieController;
use App\Http\Controllers\admin\LinkMovieController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\LoginGoogleController;
use App\Http\Controllers\LoginFacebookController;
//sitemap
use Carbon\Carbon;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Blog;
use App\Models\Country;
use App\Models\Movie;


//login
Route::get('/login', [LoginController::class, 'index'])->name('auth.index')->middleware(LoginMiddleware::class);
Route::post('/do_login', [LoginController::class, 'login'])->name('auth.do_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');

//login google
Route::controller(LoginGoogleController::class)->group(function(){
    Route::get('auth/google', 'redirectToGoogle')->name('auth.google');
    Route::get('auth/google/callback', 'handleGoogleCallback');
});

//login facebook
Route::get('auth/facebook', [LoginFacebookController::class, 'redirectToFacebook'])->name('auth.facebook');
Route::get('auth/facebook/callback', [LoginFacebookController::class, 'handleFacebookCallback']);


// login admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard') ->middleware(CheckAdmin::class);
//route admin
Route::resource('/admin/category', CategoryController::class);
Route::post('resorting', [CategoryController::class,'resorting'])->name('resorting')->middleware(CheckAdmin::class);
Route::resource('/admin/genre', GenreController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/movie', MovieController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/country', CountryController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/episode', EpisodeController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/blog', BlogController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/linkmovie', LinkMovieController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/user', UserController::class)->middleware(CheckAdmin::class);
Route::get('admin/user/phan-vai-tro/{id}', [UserController::class,'phan_vaitro'])->middleware(CheckAdmin::class)->name('phan_vaitro');
Route::post('admin/user/insert-roles/{id}', [UserController::class,'insert_roles'])->middleware(CheckAdmin::class)->name('insert_roles');
Route::get('admin/user/phan-quyen/{id}', [UserController::class,'phan_quyen'])->middleware(CheckAdmin::class)->name('phan_quyen');
Route::post('admin/user/insert-quyen/{id}', [UserController::class,'insert_quyen'])->middleware(CheckAdmin::class)->name('insert_quyen');
Route::post('admin/user/add-permission', [UserController::class,'add_permissions'])->middleware(CheckAdmin::class)->name('add_permissions');
Route::post('admin/user/add-roles', [UserController::class,'add_roles'])->middleware(CheckAdmin::class)->name('add_roles');

//Thay đổi dữ liệu trong movie ajax
Route::get('update-nam-phim', [MovieController::class,'update_year'])->name('update-year-phim');
Route::get('select-movie', [EpisodeController::class,'selectmovie'])->name('select-movie');
Route::get('/tim-kiem', [PageController::class, 'search'])->name('search');
Route::get('add-episode/{id}', [EpisodeController::class,'add_episode'])->name('add-episode');
Route::get('category-choose', [MovieController::class,'category_choose'])->name('category_choose');
Route::get('country-choose', [MovieController::class,'country_choose'])->name('country_choose');
Route::get('trangthai-choose', [MovieController::class,'trangthai_choose'])->name('trangthai_choose');
Route::get('phimhot-choose', [MovieController::class,'phimhot_choose'])->name('phimhot_choose');
Route::get('slide-choose', [MovieController::class,'slide_choose'])->name('slide_choose');
Route::post('update-image-movie-ajax', [MovieController::class,'update_image_movie_ajax'])->name('update-image-movie-ajax');
Route::post('show-video', [MovieController::class,'watch_video'])->name('watch-video');


//Register
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/do_register', [RegisterController::class, 'register'])->name('auth.do_register');




Route::get('/', [PageController::class, 'getGioithieu'])->name('gioithieu');
Route::get('/index', [PageController::class, 'getTrangchu'])->name('pages.trangchu')->middleware(AuthMiddleware::class);




//các thể loại
Route::get('/danh-muc/{slug}', [PageController::class, 'getDanhmMuc'])->name('category')->middleware(AuthMiddleware::class);
Route::get('/the-loai/{slug}', [PageController::class, 'getTheloai'])->name('genre')->middleware(AuthMiddleware::class);
Route::get('/quocgia/{slug}', [PageController::class, 'getQuocgia'])->name('country')->middleware(AuthMiddleware::class);

//chi tiết phim
Route::get('/chitiet/{slug}', [PageController::class, 'getChitiet'])->name('pages.chitiet')->middleware(AuthMiddleware::class);
Route::post('add-rating', [PageController::class, 'add_rating'])->name('add-rating');
Route::get('/xem-phim/{slug}/{tap}/{server_active}', [PageController::class, 'getXemphim'])->name('watch_vip')->middleware(AuthMiddleware::class);

//chi tiết phim vip
Route::get('/chi-tiet-vip/{slug}', [PageController::class, 'getChitiet_vip'])->name('pages.chitetvip')->middleware(AuthMiddleware::class);
Route::get('/xem-phim-vip/{slug}/{tap}/{server_active}', [PageController::class, 'getXemphim_vip'])->name('watch_vip')->middleware(AuthMiddleware::class);

//gói phim
Route::get('/goiphim/{id}', [PageController::class, 'getGoiphim'])->middleware(AuthMiddleware::class)->name('goiphim_page');
Route::get('/goiphim_thanhtoan', [PageController::class, 'getGoiphim_thanhtoan'])->middleware(AuthMiddleware::class)->name('goiphim');

Route::get('/blog', [PageController::class, 'getBlog'])->name('blog')->middleware(AuthMiddleware::class);
Route::get('/blog_review/{slug}', [PageController::class, 'getBlog_review'])->name('blog-view')->middleware(AuthMiddleware::class);


//Đặt vé
Route::get('/datghe', [PageController::class, 'getchoghe'])->middleware(AuthMiddleware::class);
Route::get('/datbapnuoc', [PageController::class, 'getdatbapnuoc'])->middleware(AuthMiddleware::class);
Route::get('/thanhtoan', [PageController::class, 'getthanhtoan'])->middleware(AuthMiddleware::class);
Route::get('/thongtinve', [PageController::class, 'getthongtinve'])->middleware(AuthMiddleware::class);



//route leech movie 
Route::get('/leech-movie', [LeechMovieController::class, 'leech_movie'])->name('leech_movie')->middleware(CheckAdmin::class);
Route::get('/leech-detail/{slug}', [LeechMovieController::class, 'leech_detaiil'])->name('leech-detaiil')->middleware(CheckAdmin::class);
Route::post('/leech-store/{slug}', [LeechMovieController::class, 'leech_store'])->name('leech-store')->middleware(CheckAdmin::class);
Route::get('/leech-episode/{slug}', [LeechMovieController::class, 'leech_episode'])->name('leech_episode')->middleware(CheckAdmin::class);
Route::post('/leech-episode-store/{slug}', [LeechMovieController::class, 'leech_episode_store'])->name('leech-episode-store')->middleware(CheckAdmin::class);
//ajax chi tiet phim
Route::post('/watch-leech-detail', [LeechMovieController::class, 'watch_leech_detail'])->name('watch-leech-detail');

//cổng thanh toán
Route::post('/momo_payment', [CheckoutController::class, 'momo_payment'])->name('momo_payment');
Route::post('/vnpay_payment', [CheckoutController::class, 'vnpay_payment'])->name('vnpay_payment');


//Lọc phim
Route::get('loc-phim', [PageController::class, 'loc_phim'])->name('loc_phim')->middleware(AuthMiddleware::class);


//sitemap

Route::get('/sitemap',function() {
    $sitemap = Sitemap::create()
    ->add(Url::create(route('gioithieu'))->setLastModificationDate(Carbon::now('Asia/Ho_Chi_Minh'))->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)->setPriority(1))
    ->add(Url::create(route('auth.index'))->setLastModificationDate(Carbon::now('Asia/Ho_Chi_Minh'))->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)->setPriority(1))
    ;
    // $sitemap = Sitemap::create()
    // ->add(Url::create(route('login'))->setLastModificationDate(Carbon::now('Asia/Ho_Chi_Minh'))->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)->setPriority(0.2))
    // ;

    Category::all()->each(function(Category $cate) use ($sitemap) {
        $sitemap->add(Url::create("/danh-muc/{$cate->slug}")->setLastModificationDate(Carbon::now('Asia/Ho_Chi_Minh'))->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)->setPriority(0.8));
    });
    Movie::all()->each(function(Movie $cate) use ($sitemap) {
        $sitemap->add(Url::create("/phim/{$cate->slug}")->setLastModificationDate(Carbon::now('Asia/Ho_Chi_Minh'))->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY)->setPriority(0.8));
    });

    $sitemap->writeToFile(public_path('sitemap.xml'));
    return "Thành công";
});