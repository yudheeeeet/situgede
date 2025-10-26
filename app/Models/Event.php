<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'judul',
        'desc',
        'media'
    ];

    public function getImageUrlAttribute()
    {
        return $this->media ? asset('storage/' . $this->media) : null;
    }
}
