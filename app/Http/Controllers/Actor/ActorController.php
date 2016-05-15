<?php

namespace App\Http\Controllers\Actor;

use App\Actor;
use App\Trailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\MyController;

class ActorController extends MyController
{
    public function actor(Actor $actor, $slug)
    {
        $trailer = new Trailer();
        return view('actor.actor',[
            'actor' => $this->myExeption($actor->getActorBySlug($slug)),
            'editorsChoice' => $trailer->getEditorsChoice()
        ]);
    }
}
