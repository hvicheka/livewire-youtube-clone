<div class="container">
    <div class="justify-content-center">
        @forelse($videos as $video)
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('videos.watch',$video) }}">
                                <img src="{{ $video->thumbnail }}" class="img-thumbnail" width="100" height="100"
                                     alt="No Image">
                            </a>
                        </div>
                        <div class="col-md-3">
                            <h5>{{ $video->title }}</h5>
                            <p class="text-truncate">{{ $video->description }}</p>
                        </div>
                        <div class="col-md-2">
                            {{ $video->visibility }}
                        </div>
                        <div class="col-md-2">
                            {{ $video->created_at->format('m-d-Y') }}
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('videos.edit',['channel' => auth()->user()->channel,'video' => $video]) }}"
                               class="btn btn-sm btn-primary">Edit</a>
                            @if(auth()->user()->owns($video))
                                <a wire:click="delete({{$video}})" class="btn btn-sm btn-danger">Delete</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="card my-2">
                <div class="card-body text-center">
                    No Video
                </div>
            </div>
        @endforelse

    </div>
    <div class="row justify-content-center mx-auto">
        {{ $videos->links() }}
    </div>
</div>
