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
    protected $slug = 'slug';
    protected $trailerId = 'trailer_id';
    protected $actorId = 'actor_id';

    protected $actorName = 'name';
    protected $actorBiography = 'biography';

    protected $trailerTitle = 'title';
    protected $trailerDescription = 'description';
    protected $trailerYear = 'year';


    protected $groupBy;

    private function db($table)
    {
        return \DB::table($this->tables[$table]);
    }

    public function search($search)
    {
        return [
            'trailers' => $this->searchEntity($search, $this->trailerId),
            'actors' => $this->searchEntity($search, $this->actorId)
        ];
    }

    public function searchEntity($search, $entityId)
    {
        $searchArray = explode(' ', trim($search));
        $searchSelect = [];
        $where = [];
        $number = 1;
        $select = $entityId === $this->actorId ?
            $this->tables['a'] . '.name, ' . $this->tables['a'] . '.slug, ' . $this->tables['a'] . '.avatarka ' : '*';
        
        foreach ($searchArray as $value) {
            $where [] = $this->tables['a'] . '.' . $this->actorName . ' LIKE :' . $this->actorName . $number;
            $where [] = $this->tables['a'] . '.' . $this->actorBiography . ' LIKE :' . $this->actorBiography . $number;
            $where [] = $this->tables['a'] . '.' . $this->slug . ' LIKE :' . $this->slug . $number;

            $where [] = $this->tables['t'] . '.' . $this->trailerTitle . ' LIKE :' . $this->trailerTitle . $number;
            $where [] = $this->tables['t'] . '.' . $this->trailerDescription . ' LIKE :' . $this->trailerDescription . $number;
            $where [] = $this->tables['t'] . '.' . $this->trailerYear . ' LIKE :' . $this->trailerYear . $number;
            $where [] = $this->tables['t'] . '.' . $this->slug . ' LIKE :' . $this->slug . 'Trailer' . $number;


            $searchSelect[$this->actorName . $number] = '%' . trim($value) . '%';
            $searchSelect[$this->actorBiography . $number] = '%' . trim($value) . '%';
            $searchSelect[$this->slug . $number] = '%' . trim($value) . '%';

            $searchSelect[$this->trailerTitle . $number] = '%' . trim($value) . '%';
            $searchSelect[$this->trailerDescription . $number] = '%' . trim($value) . '%';
            $searchSelect[$this->trailerYear . $number] = '%' . trim($value) . '%';
            $searchSelect[$this->slug . 'Trailer' . $number] = '%' . trim($value) . '%';
            $number++;
        }
        $where = implode(' OR ', $where);

        return \DB::select("
                          SELECT {$select}
                          FROM {$this->tables['a']} 
                          LEFT JOIN {$this->tables['at']} ON {$this->tables['a']}.id = {$this->tables['at']}.actor_id
                          LEFT JOIN {$this->tables['t']} ON {$this->tables['at']}.trailer_id = {$this->tables['t']}.id
                          WHERE {$where}
                          GROUP BY {$this->tables['at']}.{$entityId}
                          ", $searchSelect
        );
    }
}
