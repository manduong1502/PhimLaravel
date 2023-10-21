<?php

use App\Http\Controllers\chitietController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pagecontroler;
use Illuminate\Contracts\Pagination\Paginator;


Route::get('/', [Pagecontroler::class,'getGioithieu']);
Route::get('/index', [Pagecontroler::class, 'getTrangchu']);
Route::get('/chitiet', [Pagecontroler::class,'getChitiet']);
Route::get('/xemphim', [Pagecontroler::class,'getXemphim']);
Route::get('/theloai', [Pagecontroler::class,'getTheloai']);
Route::get('/blog', [Pagecontroler::class,'getBlog']);
Route::get('/blog_review', [Pagecontroler::class,'getBlog_review']);


