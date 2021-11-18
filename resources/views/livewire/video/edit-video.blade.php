<div class="container" wire:poll>
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Edit Video</div>
            <div class="card-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="mb-3">
                    <img src="{{ asset($video->thumbnail) }}" width="100"
                         height="100" class="img-thumbnail"
                         alt="No Image">
                    <a class="text-truncate ml-4">Processing ({{ $video->processing_percentage }})</a>
                </div>
                <form wire:submit.prevent="update">
                    <div class="form-group">
                        <label id="name">Title</label>
                        <input class="form-control @error('video.title') is-invalid @enderror" name="name" id="name"
                               value="{{ $video->title }}" wire:model="video.title">
                        @error('video.title')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label id="description">Description</label>
                        <textarea class="form-control @error('video.description') is-invalid @enderror" rows="5"
                                  name="description"
                                  id="description"
                                  wire:model="video.description">{{ $video->description }}</textarea>
                        @error('video.description')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label id="visibility">Visibility</label>
                        <select class="form-control @error('video.visibility') is-invalid @enderror" name="visibility"
                                id="visibility" wire:model="video.visibility">
                            <option value="private">Private</option>
                            <option value="public">Public</option>
                            <option value="unlisted">Unlisted</option>
                        </select>
                        @error('video.visibility')
                        <small class="invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <button class="btn btn-primary" type="submit">Submit</button>
                </form>

            </div>
        </div>
    </div>
</div>
