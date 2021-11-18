<?php

namespace App\Http\Livewire\Video;

use App\Jobs\ConvertVideoForStreaming;
use App\Jobs\CreateThumbnailFromVideo;
use App\Models\Channel;
use Illuminate\Contracts\Queue\ShouldQueue;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateVideo extends Component implements ShouldQueue
{
    use WithFileUploads;

    public $channel;
    public $videoFile;

    protected $rules = [
        'videoFile' => ['mimes:mp4,mov,ogg', 'max:1228800']
    ];

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.video.create-video')
            ->extends('layouts.app');
    }

    public function fileCompleted()
    {
        // validate
        $this->validate();

        // upload video file to temp folder
        $path = $this->videoFile->store('video-temp');

        //create video record in sb
        $video = $this->channel->videos()->create([
            'title' => 'untitled',
            'description' => 'none',
            'visibility' => 'private',
            'path' => explode('/', $path)[1]
        ]);

        // dispatch job
        CreateThumbnailFromVideo::dispatch($video);
        ConvertVideoForStreaming::dispatch($video);
        //redirect to edit route
        return redirect()->route('videos.edit', [
            'channel' => $this->channel,
            'video' => $video,
        ]);
    }

}
