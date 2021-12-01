<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string)Str::uuid();
        });
    }

    public function channel()
    {
        return $this->hasOne(Channel::class);
    }

    public function owns(Video $video)
    {
        return auth()->user()->id === $video->channel->user_id;
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function subscribedChannels()
    {
        return (bool)$this->belongsToMany(Subscription::class, 'subscription');
    }

    public function isSubscribedTo(Channel $channel)
    {
        return $this->subscriptions()->where('channel_id', '=', $channel->id)->count();
    }
}
