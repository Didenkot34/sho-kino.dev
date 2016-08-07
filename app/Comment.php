<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Comment extends Model
{
    protected $table = 'comments';
    protected $id = 'id';
    protected $comment = 'comment';
    protected $trailerId = 'trailer_id';
    protected $userId = 'user_id';

    public function trailers()
    {
        return $this->belongsTo('App\Trailer', 'trailer_id');
    }
    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function saveComment($comment,$trailerId)
    {
        return $this->db()
            ->insert([
                $this->comment => $comment,
                $this->trailerId =>$trailerId,
                $this->userId =>Auth::user()->id
            ]);
    }

    /**
     * @return array
     */
    public function getCommentsByTrailerId($trailerId)
    {
        return $this->db()
            ->leftJoin('users', $this->table . '.user_id', '=', 'users.id')
            ->where($this->trailerId, $trailerId)->orderBy('comments.created_at','desc')->get();

    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    private function db()
    {
        return \DB::table($this->table);
    }
}
