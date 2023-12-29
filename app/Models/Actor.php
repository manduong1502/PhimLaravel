<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function movie () {
        return $this->belongsTo(Movie::class);
    }

    public function movie_vip () {
        return $this->belongsTo(Movie_vip::class);
    }
}
