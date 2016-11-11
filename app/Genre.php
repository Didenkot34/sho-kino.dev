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

    public function getActiveGenres()
    {
        return $this->leftJoin('genre_trailer',$this->table . '.id', '=', 'genre_trailer.genre_id' )
            ->whereNotNull('genre_trailer.genre_id')
            ->groupBy($this->table . '.id')
            ->get();
    }
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }
}
