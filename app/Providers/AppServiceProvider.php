<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Category; 
use App\Models\Movie;
use App\Models\Country;
use App\Models\Genre;
use App\Models\Blog;
use App\Models\Movie_vip;
use App\Models\Episode;   
use App\Models\Info;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        //total admin
        $info = Info::find(1);
        $category_total = Category::all()->count();
        $genre_total = Genre::all()->count();
        $country_total = Country::all()->count();
        $movie_total = Movie::all()->count();
        $blog_total = Blog::all()->count();
        $movie_vip_total = Movie_vip::all()->count();

        $meta_image =  url('uploads/logo/'.$info ->logo);

        
        $meta_image_vip =  url('uploads/logo/'.$info ->logo_vip);
        
        
        view()->share([
            'category_total'=> $category_total,
            'genre_total'=> $genre_total,
            'country_total'=>$country_total,
            'movie_total'=> $movie_total,
            'blog_total'=> $blog_total,
            'movie_vip_total' => $movie_vip_total,
            'info' => $info,
            'meta_image' => $meta_image,
            'meta_image_vip' => $meta_image_vip
        ]);
    }
}
