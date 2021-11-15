<?php

namespace App\Listeners\User;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateUserChannel
{

    public function handle($event)
    {
        $event->user->channel()->create(['name' => $event->user->name]);
    }
}
