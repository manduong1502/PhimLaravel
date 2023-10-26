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





//login
Route::get('/login', [LoginController::class, 'index'])->name('auth.index')->middleware(LoginMiddleware::class);
Route::post('/do_login', [LoginController::class, 'login'])->name('auth.do_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');


// login admin
Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard') ->middleware(CheckAdmin::class);
//route admin
Route::resource('/admin/category', CategoryController::class)->middleware(CheckAdmin::class);
Route::post('resorting', [CategoryController::class,'resorting'])->name('resorting')->middleware(CheckAdmin::class);
Route::resource('/admin/genre', GenreController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/movie', MovieController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/country', CountryController::class)->middleware(CheckAdmin::class);
Route::resource('/admin/episode', EpisodeController::class)->middleware(CheckAdmin::class);


//Register
Route::get('/register', [RegisterController::class, 'index'])->name('auth.register.index');
Route::post('/do_register', [RegisterController::class, 'register'])->name('auth.do_register');




Route::get('/', [PageController::class, 'getGioithieu']);
Route::get('/index', [PageController::class, 'getTrangchu'])->name('pages.trangchu')->middleware(AuthMiddleware::class);


Route::get('/chitiet', [PageController::class, 'getChitiet'])->middleware(AuthMiddleware::class);
Route::get('/xemphim', [PageController::class, 'getXemphim'])->middleware(AuthMiddleware::class);

//các thể loại
Route::get('/danh-muc/{slug}', [PageController::class, 'getTheloai'])->name('category')->middleware(AuthMiddleware::class);
Route::get('/the-loai/{slug}', [PageController::class, 'getTheloai'])->name('genre')->middleware(AuthMiddleware::class);
Route::get('/quocgia/{slug}', [PageController::class, 'getTheloai'])->name('country')->middleware(AuthMiddleware::class);
Route::get('/theloai/{slug}', [PageController::class, 'getTheloai'])->middleware(AuthMiddleware::class);


Route::get('/blog', [PageController::class, 'getBlog'])->middleware(AuthMiddleware::class);
Route::get('/blog_review', [PageController::class, 'getBlog_review'])->middleware(AuthMiddleware::class);


//Đặt vé
Route::get('/datghe', [PageController::class, 'getchoghe'])->middleware(AuthMiddleware::class);
Route::get('/datbapnuoc', [PageController::class, 'getdatbapnuoc'])->middleware(AuthMiddleware::class);
Route::get('/thanhtoan', [PageController::class, 'getthanhtoan'])->middleware(AuthMiddleware::class);
Route::get('/thongtinve', [PageController::class, 'getthongtinve'])->middleware(AuthMiddleware::class);
