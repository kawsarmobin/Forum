<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Channel;
use App\Discussion;
use Illuminate\Http\Request;

class DiscussionsController extends Controller
{
    public function create()
    {
        return view('discuss')
                ->with('channels', Channel::all());
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'channel_id' => 'required',
        ]);

        $discussion = Discussion::create([
            'title' => $request->title,
            'content' => $request->content,
            'channel_id' => $request->channel_id,
            'user_id' => Auth::id(),
            'slug' => str_slug($request->title),
        ]);

        Session::flash('success', 'Discussion successfully created.');

        return redirect()->route('discussion', $discussion->slug);
    }

    public function show($slug)
    {
        return view('discussions.show')
                ->with('discussion', Discussion::where('slug', $slug)->first());
    }
}
