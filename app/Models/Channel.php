<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function videos()
    {
        return $this->hasMany(Video::class);
    }

    public function getThumbnailAttribute()
    {
        if ($this->image) {
            return '/images/' . $this->image;
        }
        return 'no-thumbnail.jpg';
    }
}
