<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function dislikes()
    {
        return $this->hasMany(Dislike::class);
    }

    public function getThumbnailAttribute()
    {
        if ($this->thumbnail_image) {
            return '/videos/' . $this->id . '/' . $this->thumbnail_image;
        }
        return 'no-thumbnail.jpg';
    }

    public function getFormattedViewsAttribute()
    {
        $count = $this->views <= 1 ? 1 : $this->views;
        return $this->views . ' ' . Str::plural(' view', $count);
    }

    public function getFormattedDateAttribute()
    {
        return $this->created_at->format('Y-m-d');
    }
}
