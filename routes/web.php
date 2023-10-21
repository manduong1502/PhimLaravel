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




Route::get('/index', [Pagecontroler::class, 'getIndex']);

Route::get('/chitiet', [Pagecontroler::class,'getLoaiSP']);