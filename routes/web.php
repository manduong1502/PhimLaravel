<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\LoginMiddleware;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//login
Route::get('/login', [LoginController::class, 'index'])->name('auth.index')->middleware(LoginMiddleware::class);
Route::post('/do_login', [LoginController::class, 'login'])->name('auth.do_login');
Route::get('/logout', [LoginController::class, 'logout'])->name('auth.logout');


Route::get('/', [PageController::class, 'getGioithieu']);
Route::get('/index', [PageController::class, 'getTrangchu'])->name('pages.trangchu')->middleware(AuthMiddleware::class);
Route::get('/chitiet', [PageController::class, 'getChitiet'])->middleware(AuthMiddleware::class);
Route::get('/xemphim', [PageController::class, 'getXemphim'])->middleware(AuthMiddleware::class);
Route::get('/theloai', [PageController::class, 'getTheloai'])->middleware(AuthMiddleware::class);
Route::get('/blog', [PageController::class, 'getBlog'])->middleware(AuthMiddleware::class);
Route::get('/blog_review', [PageController::class, 'getBlog_review'])->middleware(AuthMiddleware::class);


//Đặt vé
Route::get('/datghe', [PageController::class, 'getchoghe'])->middleware(AuthMiddleware::class);
Route::get('/datbapnuoc', [PageController::class, 'getdatbapnuoc'])->middleware(AuthMiddleware::class);
Route::get('/thanhtoan', [PageController::class, 'getthanhtoan'])->middleware(AuthMiddleware::class);
Route::get('/thongtinve', [PageController::class, 'getthongtinve'])->middleware(AuthMiddleware::class);
