@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Create a new discussion</h5>
        </div>

        <div class="card-body">

            <form class="" action="{{ route('discussions.store') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-form-label text-md-right">Title</label>

                    <div class="text-center">
                        <input id="title" type="text" class="form-control" name="title" value="{{ old('title') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-form-label text-md-right">Channels</label>

                    <div class="text-center">
                        <select class="form-control" name="channel_id">
                            <option value="">Pick a channel</option>
                            @foreach ($channels as $channel)
                                <option value="{{ $channel->id }}">{{ $channel->title }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="title" class="col-form-label text-md-right">Ask a question</label>

                    <div class="text-center">
                        <textarea name="content" class="form-control" rows="8" cols="80">{{ old('content') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-sm btn-success" value="Create discussion">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
