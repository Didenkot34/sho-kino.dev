<?php

namespace App\Http\Controllers\Comment;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function addComment(Request $request)
    {
        dd($request->all());
    }
}
