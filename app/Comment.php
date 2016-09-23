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
    protected $active = 'active';
    protected $userId = 'user_id';

    public function trailers()
    {
        return $this->belongsTo('App\Trailer', 'trailer_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function saveComment($comment, $trailerId)
    {
        return $this->db()
            ->insert([
                $this->comment => $comment,
                $this->trailerId => $trailerId,
                $this->userId => Auth::user()->id
            ]);
    }

    /**
     * @return array
     */
    public function getCommentsByTrailerId($trailerId)
    {
        return $this->db()
            ->leftJoin('users', $this->table . '.user_id', '=', 'users.id')
            ->leftJoin('social_accounts', 'social_accounts.user_id', '=', 'users.id')
            ->where($this->trailerId, $trailerId)
            ->where($this->active, 1)
            ->orderBy('comments.created_at', 'desc')->get();

    }

    /**
     * @return \Illuminate\Database\Query\Builder
     */
    private function db()
    {
        return \DB::table($this->table);
    }
}
