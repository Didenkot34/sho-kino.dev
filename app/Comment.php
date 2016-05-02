<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';

    public function trailers()
    {
        return $this->belongsTo('App\Trailer', 'trailer_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
