<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    public $timestamps = false;
    use HasFactory;
    public function movie () {
        return $this->belongsTo(Movie::class);
    }

    public function movie_vip () {
        return $this->belongsTo(Movie_vip::class);
    }

    public function blog () {
        return $this->belongsTo(Blog::class);
    }
}
