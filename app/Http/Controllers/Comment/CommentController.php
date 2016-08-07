<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function addComment(Request $request, Comment $comment)
    {
        if($request->ajax()) {
            $validator = $this->validator($request->all(), ['comment' => 'required|max:520'], 
                [
                    'required' => 'Напишите хоть что-то;)',
                    'max' => 'Вы привысили допустимый обьем символов - :max.'
                ]);

            if ($validator->fails()) {
                return response()->json([
                    'errors' => true,
                    'messages' => $validator->messages()
                ]);
            }
            
            $id = $comment->saveComment($request->input('comment'),$request->input('trailer_id'));
            return response()->json([
                'errors' => true,
                'messages' => ['userName' => Auth::user()->name]
            ]);
        }

        return redirect()->guest('login');
    }
    /**
     * Get a validator for an incoming registration or authorization request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data, array $rules, array $errorMessages)
    {
        return Validator::make($data, $rules, $errorMessages);
    }
}
