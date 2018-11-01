<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Like;
use App\Reply;
use Illuminate\Http\Request;

class RepliesController extends Controller
{
    public function like($id)
    {

      Like::create([
        'user_id' => Auth::id(),
        'reply_id' =>$id,
      ]);

      Session::flash('success', 'You like the reply.');

      return redirect()->back();
    }

    public function unlike($id)
    {
        $like = Like::where('reply_id', $id)->where('user_id', Auth::id())->first();

        if ($like->delete()) {
            Session::flash('success', 'You unlike the reply.');
        }

        return redirect()->back();
    }

    public function best_answer($id)
    {
        $reply = Reply::find($id);

        $reply->best_answer = 1;

        $reply->user->points += 100;
        $reply->user->save();

        if ($reply->save()) {
            Session::flash('success', 'Reply has been marked as the best answer.');
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        return view('replies.edit')
                ->with('reply', Reply::find($id));
    }

    public function update($id)
    {
        $this->validate(request(),[
            'content' => 'required',
        ]);

        $reply = Reply::find($id);

        $reply->content = request()->content;

        if ($reply->save()) {
            Session::flash('success', 'Reply updated.');
        }

        return redirect()->route('discussion', $reply->discussion->slug);
    }
}
