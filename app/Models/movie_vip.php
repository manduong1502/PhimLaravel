<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_vip extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'movie_vips';

    protected $fillable = ['title','slug','description','status','image','category_id'];
    public function category () {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function country () {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function genre () {
        return $this->belongsTo(Genre::class,'genre_id');
    }
    public function episode () {
        return $this->hasMany(Episode_vip::class);
    }

    public function movie_genre () {
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }
}
