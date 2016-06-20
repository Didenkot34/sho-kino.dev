<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Search extends Model
{
    protected $tables = [
        'a' => 'actors',
        't' => 'trailers',
        'at' => 'actor_trailer',
    ];
    protected $slug = '.slug';
    protected $trailerId = '.trailer_id';
    protected $actorId = '.actor_id';

    protected $actorName = '.name';
    protected $actorBiography= '.biography';

    protected $trailerTitle = '.title';
    protected $trailerDescription = '.description';
    protected $trailerYear= '.year';


    protected $groupBy;

    private function db($table)
    {
        return \DB::table($this->tables[$table]);
    }

    public function getTrailersBySearch($search)
    {
        return $this->db('a')
            ->select('*' , $this->tables['t']. $this->slug)
            ->leftJoin($this->tables['at'], $this->tables['a']. '.id', '=', $this->tables['at'] . '.actor_id')
            ->leftJoin($this->tables['t'], $this->tables['at']. '.trailer_id', '=', $this->tables['t'] . '.id')
            ->where($this->tables['t'] . $this->trailerTitle, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->trailerDescription, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->trailerYear, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->slug, 'like' , '%' . $search . '%')

            ->orWhere($this->tables['a'] . $this->actorName, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['a'] . $this->slug, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['a'] . $this->actorBiography, 'like' , '%' . $search . '%')

            ->groupBy($this->tables['at'].$this->trailerId)
            ->get();

    }

    public function getActorsBySearch($search)
    {
        return $this->db('a')
            ->select('*' , $this->tables['a']. $this->slug)
            ->leftJoin($this->tables['at'], $this->tables['a']. '.id', '=', $this->tables['at'] . '.actor_id')
            ->leftJoin($this->tables['t'], $this->tables['at']. '.trailer_id', '=', $this->tables['t'] . '.id')
            ->where($this->tables['a'] . $this->actorName, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['a'] . $this->slug, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['a'] . $this->actorBiography, 'like' , '%' . $search . '%')

            ->orWhere($this->tables['t'] . $this->trailerTitle, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->trailerDescription, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->trailerYear, 'like' , '%' . $search . '%')
            ->orWhere($this->tables['t'] . $this->slug, 'like' , '%' . $search . '%')

            ->groupBy($this->tables['at'].$this->actorId)
            ->get();
    }

    public function getTrailersAndActorsBySearch($search)
    {
        return [
          'trailers' => $this->getTrailersBySearch($search),
            'actors' => $this->getActorsBySearch($search)
        ];
    }
}
//SELECT atr.trailer_id, a.id AS actorId,t.title, a.`name` as Actor FROM sho_kinopoisk_dev.actors AS a
//LEFT JOIN actor_trailer AS atr ON a.id = atr.actor_id
//LEFT JOIN trailers as t ON atr.trailer_id = t.id
//where title like '%Черепашки%Ниндзя%'
