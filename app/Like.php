<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $fillable = [
      'user_id', 'reply_id',
    ];


    public function user()
    {
      $this->belongsTo('App\User');
    }

    public function reply()
    {
      $this->belongsTo('App\Reply');
    }
}
