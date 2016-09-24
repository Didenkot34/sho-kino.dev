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
    
    public function searchPost(Request $request, Trailer $trailer)
    {
        $searchModel = new Search();

        $data = $searchModel->search($request->input('search'));
        $search = $request->input('search');

        if (!$data['trailers'] && !$data['actors']) {
            return view('search.empty', [
                'editorsChoice' => $trailer->getEditorsChoice(),
                'title' => \Lang::get('title.notFoundSearch',['search' => $search]),
            ]);
        }
        return view('search.search' , [
                'data' => $data,
                'title' => \Lang::get('title.successfulSearch',['search' => $search]),
            ]
        );
    }

    public function searchGet()
    {
        return redirect()->route('index');
    }
}
