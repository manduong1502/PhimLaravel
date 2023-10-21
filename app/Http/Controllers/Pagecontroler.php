<?php

namespace App\Http\Controllers;


class Pagecontroler extends Controller
{
    public function getIndex(){
     return view('pages.trangchu');
    }
     public function getLoaiSP(){
         return view('pages.chitiet');
     }
    //  public function getChitiet(){
    //      return view('page.chitietsanpham');
    //  }
    //  public function getLienhe(){
    //      return view('page.lienhe');
    //  }
    //  public function getAbout(){
    //      return view('page.about');
    //  }
}
