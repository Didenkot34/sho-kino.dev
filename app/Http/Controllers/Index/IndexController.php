<?php

namespace App\Http\Controllers\Index;

use App\Http\Requests;
use App\Trailer;
use App\Http\Controllers\Controller;

class IndexController extends Controller
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

        return view('index.index', [
            'trailers' => $trailers->getActiveTrailers(),
            'premiers' => $trailers->getPremiersOfTrailers()
        ]);
    }
}
