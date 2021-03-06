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

    public function comments()
    {
        return $this->hasMany('App\Comment', 'trailer_id');
    }

    public function genres()
    {
        return $this->belongsToMany('App\Genre');
    }

    public function actors()
    {
        return $this->belongsToMany('App\Actor');
    }

    public function countries()
    {
        return $this->belongsToMany('App\Country');
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

    public function getTrailersByFilters($genre, $year, $countrySl)
    {

        $symbolGenre = $symbolYear = $symbolCountry = '<>';
        if ($genre !== 'all') {
            $symbolGenre = '=';
        }

        if ($year !== 'all') {
            $symbolYear = '=';
        }
        if ($countrySl !== 'all') {
            $symbolCountry = '=';
        }
        $checkGenre = \DB::table('genres')->where('genres.slug', $symbolGenre, $genre)->first();
        $checkCountry = \DB::table('countries')->where('countries.slug', $symbolCountry, $countrySl)->first();

        if ($checkGenre === null || $checkCountry === null) {
            return null;
        }
        return $this->select('trailers.*')
            ->leftJoin('genre_trailer', 'trailers.id', '=', 'genre_trailer.trailer_id')
            ->leftJoin('genres', 'genres.id', '=', 'genre_trailer.genre_id')
            ->leftJoin('country_trailer', 'trailers.id', '=', 'country_trailer.trailer_id')
            ->leftJoin('countries', 'countries.id', '=', 'country_trailer.country_id')
            ->where('genres.slug', $symbolGenre, $genre)
            ->where('trailers.year', $symbolYear, $year)
            ->where('countries.slug', $symbolCountry, $countrySl)
            ->groupBy('trailers.id')
            ->get();
    }

    public function getAllTrailerYears()
    {
        return $this->distinct()->orderBy('year', 'desc')->lists('year');
    }

    public function getPremiers()
    {
        return $this->where('world_premiere', '>=', date('Y-m-d', strtotime('-45 month')))->get();
    }

    public function scopeEditorsChoice($query)
    {
        return $query->where(['editors_choice' => true]);
    }

    public function scopePublished($query)
    {
        return $query->where(['active' => true]);

    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = str_slug($value);
    }

    /**
     * @param $currentTrailer
     * @return array Similar trailers except current trailer
     */
    public function getSimilar($currentTrailer)
    {
        $genreIds = [];

        $genres = $currentTrailer->genres()->get();
        if (empty($genres)) {
            return [];
        }

        foreach ($genres as $genre) {
            $genreIds[] = $genre->id;
        }

        return $this->select('trailers.*')
            ->leftJoin('genre_trailer', 'trailers.id', '=', 'genre_trailer.trailer_id')
            ->whereIn('genre_trailer.genre_id', $genreIds)
            ->where('trailers.id', '!=' , $currentTrailer->id)
            ->published()
            ->groupBy('trailers.id')
            ->get();
    }
}
