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

Route::get('/index', [Pagecontroler::class, 'getIndex']);
Route::get('/chitiet', [Pagecontroler::class,'getLoaiSP']);
Route::get('/chitiet', [Pagecontroler::class,'getChitiet']);
Route::get('/xemphim', [Pagecontroler::class,'getXemphim']);
Route::get('/theloai', [Pagecontroler::class,'getTheloai']);
Route::get('/blog', [Pagecontroler::class,'getBlog']);
Route::get('/blog_review', [Pagecontroler::class,'getBlog_review']);
Route::get('/login', [LoginController::class,'index']);