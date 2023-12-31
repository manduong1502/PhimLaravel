<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\MovieVipController;
use App\Http\Middleware\LoginMiddleware;
use App\Http\Middleware\CheckAdmin;
use App\Http\Controllers\admin\EpisodeMoiveVipController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('/admin/movievip', MovieVipController::class);
Route::resource('/admin/episodemovievip', EpisodeMoiveVipController::class);
Route::get('/admin/episodemovievip_add/{id}',[EpisodeMoiveVipController::class,'add_episode_vip'])->name('episodemovievip');
Route::get('trangthai-choose-vip', [MovieVipController::class,'trangthai_choose_vip'])->name('trangthai_choose_vip');
Route::get('country-choose-vip', [MovieVipController::class,'country_choose_vip'])->name('country_choose_vip');
Route::get('category-choose-vip', [MovieVipController::class,'category_choose_vip'])->name('category_choose_vip');




Route::get('/movievip/showapi', [MovieVipController::class,'showapi'])->name('showapi');

