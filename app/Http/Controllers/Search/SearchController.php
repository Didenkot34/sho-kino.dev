<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Actor;
use App\Trailer;
use App\Search;

class SearchController extends Controller
{
    
    public function search(Request $request)
    {
        $searchModel = new Search();
        return view('search.search' , ['data' => $searchModel->search($request->input('search'))]
        );
    }
}
