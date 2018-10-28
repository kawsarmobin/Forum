@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <img src="{{ $discussion->user->avatar }}" alt="" width="30px" height="30px" style="border-radius: 50px">
            &nbsp; <span>{{ $discussion->user->name  }}, <code>{{ $discussion->created_at->diffForHumans() }}</code></span>
        </div>

        <div class="card-body">

            <h4 class="text-center">
                {{ $discussion->title }}
            </h4>

            <hr>

            <p class="text-center">
                {{ $discussion->content, 200 }}
            </p>

        </div>

        <div class="card-footer">
            <p>
                {{ $discussion->replies->count() }} Replies
            </p>
        </div>
    </div> <br>


    @foreach ($discussion->replies as $reply)
        <div class="card">
            <div class="card-header">
                <img src="{{ $reply->user->avatar }}" alt="" width="30px" height="30px" style="border-radius: 50px">
                &nbsp; <span>{{ $reply->user->name  }}, <code>{{ $reply->created_at->diffForHumans() }}</code></span>
            </div>

            <div class="card-body">

                <p class="text-center">
                    {{ $reply->content, 200 }}
                </p>

            </div>

            <div class="card-footer">
                <p>
                    Like
                </p>
            </div>
        </div> <br>
    @endforeach


@endsection
