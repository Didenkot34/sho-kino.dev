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

        $this->metaTitle = $trailerInfo->title . ' - ' . $this->constMetaDescription;
        $this->metaDescription = str_limit($trailerInfo->description, '200', '...');

        return view('trailer.view', [
            'trailer' => $trailerInfo,
            'similarTrailers' => $trailer->getSimilar($trailerInfo),
            'editorsChoice' => $trailer->getEditorsChoice(),
            'comments' => $comment->getCommentsByTrailerId($trailerInfo->id),
            'metaTags' => $this->createMetaTags(),
        ]);
    }

    public function films(Trailer $trailer, Genre $genre, Country $country, $genreSlug, $yearNumber, $countrySlug)
    {
        $slug = count(explode('_', $genreSlug)) > 1 ? explode('_', $genreSlug)[1] : explode('_', $genreSlug)[0];
        $year = count(explode('_', $yearNumber)) > 1 ? explode('_', $yearNumber)[1] : explode('_', $yearNumber)[0];
        $countrySl = count(explode('_', $countrySlug)) > 1 ? explode('_', $countrySlug)[1] : explode('_', $countrySlug)[0];
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
            'editorsChoice' => $trailer->getEditorsChoice(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }

    public function editorsChoice(Trailer $trailer)
    {
        return view('trailer.editorsChoicePage', [
            'editorsChoice' => $trailer->getEditorsChoice(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }

    public function premiers(Trailer $trailer)
    {

        return view('trailer.premiers', [
            'premiers' => $trailer->getPremiersOfTrailers(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }
}
