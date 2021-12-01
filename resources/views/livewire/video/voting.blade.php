<div>
    <span class="pull-right">
        <i wire:click.prevent="like"
           class="fa fa-thumbs-up fa-lg voting-button {{ $likeActive ? 'text-success' : '' }}"></i>
        {{ $video->likes_count }}
        <i wire:click.prevent="dislike"
           class="fa fa-thumbs-down fa-lg voting-button {{ $dislikeActive ? 'text-danger' : '' }}"></i>
        {{ $video->dislikes_count }}
    </span>
</div>
