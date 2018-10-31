<?php

namespace App;

use Auth;
use App\Wather;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $fillable = [
        'user_id', 'channel_id', 'title', 'content', 'slug',
    ];

    public function channel()
    {
        return $this->belongsTo('App\Channel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function replies()
    {
        return $this->hasMany('App\Reply');
    }

    public function wathers()
    {
        return $this->hasMany('App\Wather');
    }

    public function is_being_watched_by_auth_user()
    {
        $id = Auth::id();

        $watchers_id = array();

        foreach ($this->wathers as $watcher) :
            array_push($watchers_id, $watcher->user_id);
        endforeach;

        if (in_array($id, $watchers_id)) {
            return true;
        } else {
            return false;
        }
    }
}
