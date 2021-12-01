<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChannelInfo extends Component
{
    public $channel;
    public $userSubscribed = false;

    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        if (Auth::check()) {
            $this->userSubscribed = (bool)auth()->user()->isSubscribedTo($this->channel);
        }
        $this->channel->loadCount(['subscriptions']);
        return view('livewire.channel.channel-info')
            ->extends('layouts.app');
    }

    public function toggleSubscribeChannel()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (auth()->user()->isSubscribedTo($this->channel)) {
            Subscription::where([
                'user_id' => auth()->user()->id,
                'channel_id' => $this->channel->id
            ])->delete();
        } else {
            Subscription::create([
                'user_id' => auth()->user()->id,
                'channel_id' => $this->channel->id
            ]);
        }

        $this->emit('load_values');
    }

}
