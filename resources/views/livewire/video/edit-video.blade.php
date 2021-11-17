<div class="container">
    <div class="justify-content-center">
        <div class="card">
            <div class="card-header">Upload Video</div>
            <div class="card-body">
                <form>
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
                </form>

            </div>
        </div>
    </div>
</div>
