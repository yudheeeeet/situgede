<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'judul',
        'link',
        'desc',
        'media',
    ];

    public function getImageUrlAttribute()
    {
        return $this->media ? asset('storage/' . $this->media) : null;
    }
}
