<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History_movie extends Model
{
    use HasFactory;

    protected $table = 'history_movies';

    public $timestamps = false;

    protected $fillable = ['user_id','movie_id','episode_id','ngay_tao','ngay_cap_nhat'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function episode() {
        return $this->belongsTo(Episode::class);
    }

    public function Movie() {
        return $this->belongsTo(Movie::class);
    }

    public function Movie_vip() {
        return $this->belongsTo(Movie_vip::class);
    }

    public function episode_total() {
        return $this->hasMany(Episode::class);
    }

}
