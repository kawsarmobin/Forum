@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class="text-center">Update a reply</h5>
        </div>

        <div class="card-body">

            <form class="" action="{{ route('reply.update', $reply->id) }}" method="post">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="title" class="col-form-label text-md-right">Ask a question</label>

                    <div class="text-center">
                        <textarea name="content" class="form-control" rows="8" cols="80">{{ $reply->content }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <input type="submit" class="btn btn-sm btn-success" value="Save reply changes">
                    </div>
                </div>

            </form>

        </div>
    </div>
@endsection
