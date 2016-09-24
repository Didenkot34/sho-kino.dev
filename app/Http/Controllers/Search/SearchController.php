<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;
use App\Actor;
use App\Trailer;
use App\Search;

class SearchController extends MyController
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
                'metaTags' => $this->createMetaTags(),
            ]);
        }
        return view('search.search' , [
                'data' => $data,
                'title' => \Lang::get('title.successfulSearch',['search' => $search]),
                'metaTags' => $this->createMetaTags(),
            ]
        );
    }

    public function searchGet()
    {
        return redirect()->route('index');
    }
}
