<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $table = 'actors';

    public function trailers()
    {
        return $this->belongsToMany('App\Trailer');
    }
    public function youtube()
    {
        return $this->belongsToMany('App\Youtube');
    }

    public function getActorBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function getAllActors()
    {
        return $this->get();
    }
}
