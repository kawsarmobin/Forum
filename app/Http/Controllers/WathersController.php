<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Wather;
use Illuminate\Http\Request;

class WathersController extends Controller
{
    public function watch($id)
    {
        Wather::create([
            'user_id' => Auth::id(),
            'discussion_id' => $id,
        ]);

        Session::flash('success', 'You are watching this discussion.');

        return redirect()->back();
    }

    public function unwatch($id)
    {
        $watcher = Wather::where('user_id', Auth::id())->where('discussion_id', $id);

        if ($watcher->delete()) {
            Session::flash('success', 'You are no longer watching this discussion.');
        }

        return redirect()->back();
    }
}
