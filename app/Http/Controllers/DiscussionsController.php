<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Reply;
use App\Channel;
use Notification;
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
        $discussion = Discussion::where('slug', $slug)->first();

        $best_answer = $discussion->replies()->where('best_answer', 1)->first();

        return view('discussions.show')
                ->with('discussion', $discussion)
                ->with('best_answer', $best_answer);
    }

    public function reply($id)
    {
      $discussion = Discussion::find($id);

      $reply = Reply::create([
        'user_id' => Auth::id(),
        'discussion_id' => $id,
        'content' => request()->reply,
      ]);

      $wathers = array();

      foreach ($discussion->wathers as $wather):
          array_push($wathers, User::find($wather->user_id));
      endforeach;

      Notification::send($wathers, new \App\Notifications\NewReplyAdded($discussion));

      Session::flash('success', 'Replied to discussion.');

      return redirect()->back();
    }
}
