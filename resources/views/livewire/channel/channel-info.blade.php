<div class="row mt-2">
    <div class="col-md-8">
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img src="{{ asset($channel->thumbnail) }}" alt="" class="rounded-circle" width="70" height="70">
                <div class="ml-3 mt-3">
                    <h5>{{ $channel->name }}</h5>
                    <p>{{ $channel->subscriptions_count }} Subscribers</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4 text-right mt-4">
        <button wire:click.stop="toggleSubscribeChannel"
                class="btn btn-danger text-uppercase text-white">{{ $userSubscribed ? 'Subscribed' : 'Subscribe' }}</button>
    </div>

</div>
