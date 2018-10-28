@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Update your channel</h5>
                    </div>

                    <div class="card-body">

                        <form class="" action="{{ route('channels.update', $channel->id) }}" method="post">
                            {{ csrf_field() }} {{ method_field('put') }}

                            <div class="form-group row">
                                <label for="title" class="col-md-3 col-form-label text-md-right">Title</label>

                                <div class="col-md-6 text-center">
                                    <input id="title" type="text" class="form-control" name="title" value="{{ $channel->title }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="text-center">
                                    <input type="submit" class="btn btn-sm btn-primary" value="Update channel">
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
