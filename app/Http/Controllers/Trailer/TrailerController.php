<?php

namespace App\Http\Controllers\Trailer;

use App\Genre;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Trailer;

class TrailerController extends Controller
{
    public function view(Trailer $trailer, $slug)
    {
        return view('trailer.view', [
            'trailer' => $trailer->getTrailerBySlug($slug),
            'activeTrailers' => $trailer->getActiveTrailers(),
            'editorsChoice' => $trailer->getEditorsChoice()
        ]);
    }

    public function films(Trailer $trailer, Genre $genre, $genreSlug, $yearNumber)
    {
        $slug = explode('_', $genreSlug)[1];
        $year = explode('_', $yearNumber)[1];
        return view('trailer.films', [
            'trailers' => $trailer->getTrailersByFilters($slug, $year),
            'genres' => $genre->get(),
            'nameOfGenre' => $slug !== 'all' ? $genre->getNameOfGenreBySlug($slug) : false,
            'selectedGenre' => $slug,
            'selectedYear' => $year,
            'allTrailerYears' => $trailer->getAllTrailerYears()
        ]);
    }
}
