<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagecontroler;
use App\Http\Controllers\LoginController;

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
Route::get('/login', [LoginController::class,'index']);


Route::get('/', [Pagecontroler::class,'getGioithieu']);
Route::get('/index', [Pagecontroler::class, 'getTrangchu']);
Route::get('/chitiet', [Pagecontroler::class,'getChitiet']);
Route::get('/xemphim', [Pagecontroler::class,'getXemphim']);
Route::get('/theloai', [Pagecontroler::class,'getTheloai']);
Route::get('/blog', [Pagecontroler::class,'getBlog']);
Route::get('/blog_review', [Pagecontroler::class,'getBlog_review']);


//Đặt vé
Route::get('/datghe', [Pagecontroler::class,'getchoghe']);
Route::get('/datbapnuoc', [Pagecontroler::class,'getdatbapnuoc']);
Route::get('/thanhtoan', [Pagecontroler::class,'getthanhtoan']);
Route::get('/dat-ve', [Pagecontroler::class,'getdatve']);
Route::get('/thongtinve', [Pagecontroler::class,'getthongtinve']);

