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
    public function getActiveCountries()
    {
        return $this->leftJoin('country_trailer',$this->table . '.id', '=', 'country_trailer.country_id' )
            ->whereNotNull('country_trailer.country_id')
            ->groupBy($this->table . '.id')
            ->get();
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
