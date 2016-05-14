<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function addComment(Request $request, Comment $comment)
    {
        $id = $comment->saveComment($request->except('_token'));
        echo json_encode(['comment' => $request->input('comment')]);
        exit;
    }
}
