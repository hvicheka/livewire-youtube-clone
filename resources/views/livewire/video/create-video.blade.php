<div>
    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Upload Video</div>
                <div class="card-body"
                     x-data="{ isUploading: false, progress: 0 }"
                     x-on:livewire-upload-start="isUploading = true"
                     x-on:livewire-upload-finish="isUploading = false , $wire.fileCompleted()"
                     x-on:livewire-upload-error="isUploading = false"
                     x-on:livewire-upload-progress="progress = $event.detail.progress"
                >
                    <div class="progress mb-4" x-show="isUploading">
                        <div class="progress-bar progress-bar-striped" role="progressbar"
                             :style="`width: ${progress}%`"></div>
                    </div>
                    <form x-show="!isUploading" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="file" class="form-control" wire:model="videoFile">
                            @error('videoFile')
                            <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
