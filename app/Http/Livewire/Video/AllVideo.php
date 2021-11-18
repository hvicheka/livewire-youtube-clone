<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{
    use WithPagination;

    public $video;
    public $channel;

    protected $paginationTheme = 'bootstrap';

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        $videos = auth()->user()->channel->videos()->paginate(10);
        return view('livewire.video.all-video', [
            'videos' => $videos
        ])
            ->extends('layouts.app');
    }
}
