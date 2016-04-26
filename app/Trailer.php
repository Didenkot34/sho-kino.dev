<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $table = 'trailers';

    public function cinematographs()
    {
        return $this->belongsTo('App\Cinematograph');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function getActiveTrailers()
    {
        return $this->orderBy('premiere_in_ukraine', 'desc')->published()->get();
    }

    public function getTrailerBySlug($slug)
    {
        return $this->where(['slug' => $slug])->first();
    }

    public function getEditorsChoice()
    {
        return $this->orderBy('premiere_in_ukraine', 'desc')->published()->editorsChoice()->get();
    }

    public function getTrailersByFilters($genre, $year)
    {

        $symbolGenre = $symbolYear = '<>';
        if ($genre !== 'all') {
            $symbolGenre = '=';
        }

        if ($year !== 'all') {
            $symbolYear = '=';
        }
        return $this->select('trailers.*')->leftJoin('genre_trailer', 'trailers.id', '=', 'genre_trailer.trailer_id')
            ->leftJoin('genres', 'genres.id', '=', 'genre_trailer.genre_id')
            ->where('genres.slug', $symbolGenre, $genre)
            ->where('trailers.year', $symbolYear, $year)
            ->groupBy('trailers.id')
            ->get();
    }

    public function getAllTrailerYears()
    {
        return $this->distinct()->lists('year');
    }

    public function scopeEditorsChoice($query)
    {
        $query->where(['editors_choice' => true]);
    }

    public function scopePublished($query)
    {
        $query->where(['active' => true]);

    }
}
