<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode_vip extends Model
{
    use HasFactory;
    protected $table = 'episode_vips';

    protected $fillable = ['movie_vip_id','linkphim','episode','server'];

    public function movie_vip () {
        return $this->belongsTo(Movie_vip::class);
    }
}
