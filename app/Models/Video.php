<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_image) {
            return '/videos/' . $this->id . '/' . $this->thumbnail_image;
        }
        return 'no-thumbnail.jpg';
    }
}
