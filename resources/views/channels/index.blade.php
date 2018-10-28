@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-center">Channels</h5>
                    </div>

                    <div class="card-body">

                        <table class="table table-hover">
                            <thead>
                                <th>Title</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </thead>
                            <tbody>
                                @if ($channels)
                                    @foreach ($channels as $channel)
                                        <tr>
                                            <td>{{ $channel->title }}</td>
                                            <td>
                                                <a href="{{ route('channels.edit', $channel->id) }}" class="btn btn-sm btn-info">Edit</a>
                                            </td>
                                            <td>
                                                <form class="" action="{{ route('channels.destroy', $channel->id) }}" method="post">
                                                    {{ csrf_field() }} {{ method_field('delete') }}
                                                    <input type="submit" name="" class="btn btn-sm btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
