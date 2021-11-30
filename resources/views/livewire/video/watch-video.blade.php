@push('css')
    <!-- Videojs -->
    <link href="https://vjs.zencdn.net/7.17.0/video-js.css" rel="stylesheet"/>
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
                </div>
            </div>
        </div>
    </div>
</div>

@push('js')
    <!-- Videojs -->
    <script src="https://vjs.zencdn.net/7.17.0/video.min.js"></script>
@endpush

