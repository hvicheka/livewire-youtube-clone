@push('css')
    <!-- Videojs -->
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endpush
<div>
    <div class="container">
        <div class="justify-content-center">
            <div class="card my-2">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="video-container">
                                <div class="video-container">
                                    <video controls preload="auto" id="yt-video"
                                           class="video-js vjs-fill vjs-styles=defaults vjs-big-play-centered"
                                           data-setup="{}">
                                        <source src="{{ asset('videos/'. $video->id . '/' . $video->processed_file)}}"
                                                type="application/x-mpegURL"/>
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-8">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h3>{{ $video->title }}</h3>
                                    <p>{{ $video->formatted_views  }} | {{ $video->formatted_date }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            Voting
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <!-- Videojs -->
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
    <script>
        const player = videojs('yt-video')
        player.on('timeupdate', function () {
            if (this.currentTime() > 0) {
                this.off('timeupdate')
                Livewire.emit('VideoViewed')
            }
        })
    </script>
@endpush

