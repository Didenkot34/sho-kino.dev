<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    protected $table = 'youtube';

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }
}
