<div>
    <div>
        @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        @if($channel->image)
            <img src="{{ asset('images/'. $channel->image) }}" class="img-thumbnail" alt="Image">
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
            <label id="description">Description</label>
            <textarea class="form-control @error('channel.description') is-invalid @enderror" rows="5"
                      name="description"
                      id="description" wire:model="channel.description">{{ $channel->description }}</textarea>
            @error('channel.description')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label id="image">Image</label>
            <input type="file" class="form-control" wire:model="image">
            @error('image')
            <small class="invalid-feedback">{{ $message }}</small>
            @enderror
            @isset($image)
                <p>Image Preview:</p>
                <img src="{{ $image->temporaryUrl() }}" alt="" class="img-fluid">
            @endisset
        </div>
        <button class="btn btn-primary" type="submit">Submit</button>
    </form>

</div>
