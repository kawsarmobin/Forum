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
                @if ($reply->is_liked_by_auth_user())
                  <a href="{{ route('reply.unlike', $reply->id) }}" class="btn btn-sm btn-danger">Unlike <span class="badge">{{ $reply->likes->count() }}</span></a>
                @else
                  <a href="{{ route('reply.like', $reply->id) }}" class="btn btn-sm btn-success">Like <span class="badge">{{ $reply->likes->count() }}</span></a>
                @endif
            </div>
        </div> <br>
    @endforeach


    <div class="card">
      <div class="card-body">
        <form action="{{ route('discussion.reply', $discussion->id) }}" method="post">
          @csrf

          <div class="form-group">
            <label for="" class="form-label">
              <h5>Leave a reply...</h5>
            </label>
            <textarea class="form-control" name="reply" rows="8" cols="80">{{ $discussion->reply }}</textarea>
          </div>
          <div class="form-group" style="padding-left: 300px">
            <button type="submit" class="btn btn-sm btn-primary">Leave a reply</button>
          </div>
        </form>
      </div>
    </div>


@endsection
