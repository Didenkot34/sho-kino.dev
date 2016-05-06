<?php

namespace App\Http\Controllers\Trailer;

use App\Comment;
use App\Country;
use App\Genre;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Trailer;

class TrailerController extends Controller
{
    public function view(Trailer $trailer, Comment $comment, $slug)
    {
        return view('trailer.view', [
            'trailer' => $trailer->getTrailerBySlug($slug),
            'activeTrailers' => $trailer->getActiveTrailers(),
            'editorsChoice' => $trailer->getEditorsChoice(),
            'comments' => $comment->get()
        ]);
    }

    public function films(Trailer $trailer, Genre $genre, Country $country ,$genreSlug, $yearNumber, $countrySlug)
    {
        $slug = explode('_', $genreSlug)[1];
        $year = explode('_', $yearNumber)[1];
        $countrySl = explode('_', $countrySlug)[1];
        return view('trailer.films', [
            'trailers' => $trailer->getTrailersByFilters($slug, $year, $countrySl),
            'genres' => $genre->get(),
            'nameOfGenre' => $slug !== 'all' ? $genre->getNameOfGenreBySlug($slug) : false,
            'nameOfCountry' => $countrySl !== 'all' ? $country->getNameOfCountryBySlug($countrySl) : false,
            'selectedGenre' => $slug,
            'selectedYear' => $year,
            'selectedCountry' => $countrySl,
            'allTrailerYears' => $trailer->getAllTrailerYears(),
            'countries' => $country->get()
        ]);
    }
}
