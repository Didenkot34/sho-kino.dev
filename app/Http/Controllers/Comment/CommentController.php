<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addComment(Request $request, Comment $comment)
    {
        if($request->ajax()) {
            $id = $comment->saveComment($request->except('_token'));
            return response()->json(['comment' => $request->input('comment')]);
        }

        return redirect()->guest('login');
    }
}
