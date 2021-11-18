<?php

namespace App\Http\Livewire\Video;

use App\Models\Channel;
use App\Models\Video;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class AllVideo extends Component
{
    use WithPagination, AuthorizesRequests;

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
        ])->extends('layouts.app');
    }

    public function delete(Video $video)
    {
        $this->authorize('delete', $video);
        $deleted = Storage::disk('videos')->deleteDirectory("$video->id");
        if ($deleted) {
            $video->delete();
        }
    }
}
