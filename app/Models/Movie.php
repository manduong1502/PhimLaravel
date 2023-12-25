<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public $timestamps = false;
    use HasFactory;

    public function category () {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function country () {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function genre () {
        return $this->belongsTo(Genre::class,'genre_id');
    }

    public function actor () {
        return $this->belongsTo(Actor::class,'actor_id');
    }
    public function episode () {
        return $this->hasMany(Episode::class);
    }

    public function movie_genre () {
        return $this->belongsToMany(Genre::class,'movie_genre','movie_id','genre_id');
    }

    public function movie_actor () {
        return $this->belongsToMany(Actor::class,'movie_actors','movie_id','actor_id');
    }
}
