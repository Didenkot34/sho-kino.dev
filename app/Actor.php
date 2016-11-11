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
        return $this->paginate(20);
    }
    public function getActorsToIndexPage()
    {
        return $this->where(['show_in_index_page' => 1])->get();
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
