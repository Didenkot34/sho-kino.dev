<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $table = 'genres';

    public function trailers()
    {
        return $this->belongsToMany('App\Trailer');
    }

    public function getNameOfGenreBySlug($slug)
    {
        return $this->where(['slug' => $slug])->pluck('name')[0];
    }
}
