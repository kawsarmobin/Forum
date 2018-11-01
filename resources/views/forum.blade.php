@extends('layouts.app')

@section('content')

    @if ($discussions)
        @foreach ($discussions as $discussion)
            <div class="card">
                <div class="card-header">
                    <img src="{{ $discussion->user->avatar }}" alt="" width="30px" height="30px" style="border-radius: 50px">
                     &nbsp; <span>{{ $discussion->user->name  }}, <code>{{ $discussion->created_at->diffForHumans() }}</code></span>
                     <a class="btn btn-sm btn-outline-dark float-right" href="{{ route('discussion', $discussion->slug) }}">View</a>

                     <span class="float-right">  &nbsp;  </span>

                     @if ($discussion->hasBestAnswer())
                         <span class="btn btn-sm btn-outline-success float-right">Close</span>
                     @else
                         <span class="btn btn-sm btn-outline-danger float-right">Open</span>
                     @endif
                </div>

                <div class="card-body">

                    <h4 class="text-center">
                        {{ $discussion->title }}
                    </h4>

                    <p class="text-center">
                        {{ str_limit($discussion->content, 200) }}
                    </p>

                </div>

                <div class="card-footer">
                    <span>
                        {{ $discussion->replies->count() }} Replies
                    </span>
                    <a class="btn btn-sm btn-outline-success float-right" href="{{ route('channel', $discussion->channel->slug) }}">{{ $discussion->channel->title }}</a>
                </div>
            </div> <br>
        @endforeach

        <div class="text-center" style="padding-left: 300px">

            {{ $discussions->links() }}

        </div>

    @endif



@endsection
