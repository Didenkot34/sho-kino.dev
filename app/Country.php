<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $table = 'countries';

    public function trailers()
    {
        return $this->belongsToMany('App\Trailer');
    }
    public function getNameOfCountryBySlug($slug)
    {
        return $this->where(['slug' => $slug])->pluck('name')[0];
    }
}
