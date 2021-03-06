<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;


class EditChannel extends Component
{
    use AuthorizesRequests, WithFileUploads;

    public $channel;

    public $image;

    protected function rules()
    {
        return [
            'channel.name' => ['required', 'max:255,' . $this->channel],
            'channel.description' => ['nullable', 'max:1000'],
            'image' => ['nullable', 'image', 'max:1024'] // 1MB Max
        ];
    }

    public function mount(Channel $channel)
    {
        $this->channel = $channel;
    }

    public function render()
    {
        return view('livewire.channel.edit-channel');
    }

    public function update()
    {
        $this->authorize('update', $this->channel);
        $this->validate();
        $this->channel->update([
            'name' => $this->channel->name,
            'description' => $this->channel->description
        ]);

        if ($this->image) {
            $image = $this->image->storeAs('images', $this->channel->id . '.png');
            $imageName = explode('/', $image)[1];
            Image::make(storage_path() . '/app/' . $image)
                ->encode('png')
                ->fit(80, 80, function ($constrain) {
                    $constrain->upsize();
                })->save();
            $this->channel->update(['image' => $imageName]);
        }

        session()->flash('message', 'Channel updated');
        return redirect()->route('channel.edit', $this->channel->id);
    }
}
