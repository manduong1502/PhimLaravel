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





//login
Route::get('/login', [LoginController::class, 'index'])->name('auth.index')->middleware(LoginMiddleware::class);
Route::post('/do_login', [LoginController::class, 'login'])->name('auth.do_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');


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

//Register
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/do_register', [RegisterController::class, 'register'])->name('auth.do_register');




Route::get('/', [PageController::class, 'getGioithieu']);
Route::get('/index', [PageController::class, 'getTrangchu'])->name('pages.trangchu')->middleware(AuthMiddleware::class);


Route::get('/xemphim/{slug}/{tap}', [PageController::class, 'getXemphim'])->name('watch')->middleware(AuthMiddleware::class);

//các thể loại
Route::get('/danh-muc/{slug}', [PageController::class, 'getDanhmMuc'])->name('category')->middleware(AuthMiddleware::class);
Route::get('/the-loai/{slug}', [PageController::class, 'getTheloai'])->name('genre')->middleware(AuthMiddleware::class);
Route::get('/quocgia/{slug}', [PageController::class, 'getQuocgia'])->name('country')->middleware(AuthMiddleware::class);

//chi tiết phim
Route::get('/chitiet/{slug}', [PageController::class, 'getChitiet'])->name('pages.chitiet')->middleware(AuthMiddleware::class);



Route::get('/blog', [PageController::class, 'getBlog'])->middleware(AuthMiddleware::class);
Route::get('/blog_review', [PageController::class, 'getBlog_review'])->middleware(AuthMiddleware::class);


//Đặt vé
Route::get('/datghe', [PageController::class, 'getchoghe'])->middleware(AuthMiddleware::class);
Route::get('/datbapnuoc', [PageController::class, 'getdatbapnuoc'])->middleware(AuthMiddleware::class);
Route::get('/thanhtoan', [PageController::class, 'getthanhtoan'])->middleware(AuthMiddleware::class);
Route::get('/thongtinve', [PageController::class, 'getthongtinve'])->middleware(AuthMiddleware::class);






