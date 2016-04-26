<?php

namespace App\Http\Controllers\Actor;

use App\Actor;
use App\Trailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ActorController extends Controller
{
    public function actor(Actor $actor, $slug)
    {
        $trailer = new Trailer();
        return view('actor.actor',[
            'actor' => $actor->getActorBySlug($slug),
            'editorsChoice' => $trailer->getEditorsChoice()
        ]);
    }
}
