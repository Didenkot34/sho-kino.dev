<?php

namespace App\Http\Controllers\Trailer;

use App\Comment;
use App\Country;
use App\Genre;
use App\Http\Requests;
use App\Http\Controllers\MyController;
use App\Trailer;

class TrailerController extends MyController
{
    public function view(Trailer $trailer, Comment $comment, $slug)
    {
        $trailerInfo = $this->myExeption($trailer->getTrailerBySlug($slug));

        return view('trailer.view', [
            'trailer' => $trailerInfo,
            'activeTrailers' => $trailer->getActiveTrailers(),
            'editorsChoice' => $trailer->getEditorsChoice(),
            'comments' => $comment->getCommentsByTrailerId($trailerInfo->id)
        ]);
    }

    public function films(Trailer $trailer, Genre $genre, Country $country ,$genreSlug, $yearNumber, $countrySlug)
    {
        $slug = explode('_', $genreSlug)[1];
        $year = explode('_', $yearNumber)[1];
        $countrySl = explode('_', $countrySlug)[1];
        return view('trailer.films', [
            'trailers' => $this->myExeption($trailer->getTrailersByFilters($slug, $year, $countrySl)),
            'genres' => $genre->getActiveGenres(),
            'nameOfGenre' => $slug !== 'all' ? $genre->getNameOfGenreBySlug($slug) : false,
            'nameOfCountry' => $countrySl !== 'all' ? $country->getNameOfCountryBySlug($countrySl) : false,
            'selectedGenre' => $slug,
            'selectedYear' => $year,
            'selectedCountry' => $countrySl,
            'allTrailerYears' => $trailer->getAllTrailerYears(),
            'countries' => $country->get(),
            'editorsChoice' => $trailer->getEditorsChoice()
        ]);
    }

    public function editorsChoice(Trailer $trailer)
    {
        return view('trailer.editorsChoicePage', [
            'editorsChoice' => $trailer->getEditorsChoice()
            ]);
    }

    public function premiers(Trailer $trailer)
    {
        
        return view('trailer.premiers', [
            'premiers' => $trailer->getPremiersOfTrailers()
        ]);
    }
}
