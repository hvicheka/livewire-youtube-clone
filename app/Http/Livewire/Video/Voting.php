<?php

namespace App\Http\Livewire\Video;

use App\Models\Dislike;
use App\Models\Like;
use App\Models\Video;
use Livewire\Component;

class Voting extends Component
{
    public $video;
    public $likeActive;
    public $dislikeActive;

    protected $listeners = ['load_values' => '$refresh'];

    public function mount(Video $video)
    {
        $this->video = $video;
    }

    public function render()
    {
        $this->checkVotingActive();
        $this->video->loadCount(['likes', 'dislikes']);
        return view('livewire.video.voting')
            ->extends('layouts.app');
    }

    public function like()
    {
        if ($this->video->liked()) {
            $this->removeLike();
        } else {
            $this->video->likes()->create(['user_id' => auth()->id()]);
            $this->removeDislike();
        }
        $this->emit('load_values');
    }

    public function dislike()
    {
        if ($this->video->disliked()) {
            $this->removeDislike();
        } else {
            $this->video->dislikes()->create(['user_id' => auth()->id()]);
            $this->removeLike();
        }
        $this->emit('load_values');
    }

    private function checkVotingActive()
    {
        $this->likeActive = (bool)$this->video->liked();
        $this->dislikeActive = (bool)$this->video->disliked();
    }

    private function removeLike()
    {
        Like::where([
            'user_id' => auth()->id(),
            'video_id' => $this->video->id
        ])->delete();
    }

    private function removeDislike()
    {
        Dislike::where([
            'user_id' => auth()->id(),
            'video_id' => $this->video->id
        ])->delete();
    }

}
