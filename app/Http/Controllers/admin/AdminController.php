<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        $content = "Chào mừng bạn đã đến với trang Admin web phim"; // Thay thế bằng nội dung thực tế của bạn
        session()->put('index_content', $content);
        return view('admin.index');
    }

}
