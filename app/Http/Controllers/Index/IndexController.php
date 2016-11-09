<?php

namespace App\Http\Controllers\Index;

use App\Actor;
use App\Http\Requests;
use App\Trailer;
use App\Http\Controllers\MyController;

class IndexController extends MyController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trailers = new Trailer();
        $actors = new Actor();

        return view('index.index', [
            'actors' => $actors->getActorsToIndexPage(),
            'trailers' => $trailers->getActiveTrailers(),
            'premiers' => $trailers->getPremiers(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }
    
}
