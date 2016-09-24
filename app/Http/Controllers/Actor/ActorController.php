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
        $actorInfo = $this->myExeption($actor->getActorBySlug($slug));
        $this->metaTitle = $actorInfo->name . ' - ' . $this->constMetaDescription;
        $this->metaDescription = str_limit($actorInfo->biography, '200','...');
        return view('actor.actor',[
            'actor' => $actorInfo,
            'editorsChoice' => $trailer->getEditorsChoice(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }
}
