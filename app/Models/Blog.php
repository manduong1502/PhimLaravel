<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ChildBlog;
class Blog extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function genre () {
        return $this->belongsTo(Genre::class,'genre_id');
    }

    
}
