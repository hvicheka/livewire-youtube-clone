<?php

namespace App\Http\Livewire\Channel;

use App\Models\Channel;
use Livewire\Component;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class EditChannel extends Component
{
    use AuthorizesRequests;

    public $channel;

    protected function rules()
    {
        return [
            'channel.name' => ['required', 'max:255,' . $this->channel],
            'channel.description' => ['nullable', 'max:1000'],
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

        session()->flash('message', 'Channel updated');
        return redirect()->back();
    }
}
