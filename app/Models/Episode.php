<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $casts = [
        'episode' => 'array',
    ];
    public function movie () {
        return $this->belongsTo(Movie::class);
    }


}
