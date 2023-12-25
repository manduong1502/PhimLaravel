<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_actor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'movie_actors';
}
