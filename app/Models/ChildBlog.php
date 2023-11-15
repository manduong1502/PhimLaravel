<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChildBlog extends Model
{
    public $timestamps = false;
    use HasFactory;
    protected $table = 'child_blogs';
    protected $fillable = ['blog_id','title_small','description_small'];

    public function blog()
{
    return $this->belongsTo(Blog::class, 'blog_id');
}
}


