<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinematograph extends Model
{
    protected $table = 'cinematographs';

//    protected $fillable = [
//        'name'
//    ];

    public function trailers()
    {
        return $this->hasMany('App\Trailer');
    }
}
