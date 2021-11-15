<div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
    </div>
    <form method="POST" wire:submit.prevent="update">
        <div class="form-group">
            <label id="name">Channel Name</label>
            <input class="form-control @error('channel.name') is-invalid @enderror" name="name" id="name"
                   value="{{ $channel->name }}" wire:model="channel.name">
            @error('channel.name')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>

        <div class="form-group">
            <label id="decription">Description</label>
            <textarea class="form-control @error('channel.description') is-invalid @enderror" rows="5"
                      name="description"
                      id="decription" wire:model="channel.description">{{ $channel->description }}</textarea>
            @error('channel.description')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

</div>
