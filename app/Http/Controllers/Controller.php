<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Genre;
use App\Trailer;
use App\Country;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $genre = new Genre();
        $trailer = new Trailer();
        $country =new Country();
        return view()->share('menu', [
            'genres' => $genre->getActiveGenres(),
            'years' => $trailer->getAllTrailerYears(),
            'countries' => $country->getActiveCountries(),
            'editorsChoice' => $trailer->getEditorsChoice()
            
        ]);
    }

}
