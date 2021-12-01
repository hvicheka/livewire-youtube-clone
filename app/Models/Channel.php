<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

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


    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribers()
    {
        return $this->subscritions->count();
    }

    public function getThumbnailAttribute()
    {
        if ($this->image) {
            return '/images/' . $this->image;
        }
        return 'no-thumbnail.jpg';
    }

    public function getSubscriberCountAttribute()
    {
        $subscriber_count = $this->subscriptions->count();
        return $subscriber_count . ' ' . Str::plural('subscriber', $subscriber_count <= 1 ? 1 : $subscriber_count);
    }
}
