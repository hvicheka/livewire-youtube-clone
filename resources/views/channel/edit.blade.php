@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="card">
                <div class="card-header">Edit Channel</div>
                <div class="card-body">
                    <livewire:channel.edit-channel :channel="$channel" />
                </div>
            </div>
        </div>
    </div>
@endsection
