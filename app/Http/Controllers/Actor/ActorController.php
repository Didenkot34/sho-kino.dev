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
        $this->metaDescription = str_limit($actorInfo->biography, '200', '...');
        return view('actor.actor', [
            'actor' => $actorInfo,
            'editorsChoice' => $trailer->getEditorsChoice(),
            'metaTags' => $this->createMetaTags(),
            'zodiac' => $this->getZodiacalSign(explode('-', $actorInfo->birthday)[1], explode('-', $actorInfo->birthday)[2])
        ]);
    }

    private function getZodiacalSign($month, $day)
    {
        $signs = ['Козерог', 'Водолей', 'Рыбы', 'Овен', 'Телец', 'Близнецы', 'Рак', 'Лев', 'Девы', 'Весы', 'Скорпион', 'Стрелец'];
        $signsStart = [1 => 21, 2 => 20, 3 => 20, 4 => 20, 5 => 20, 6 => 20, 7 => 21, 8 => 22, 9 => 23, 10 => 23, 11 => 23, 12 => 23];
        return $day < $signsStart[$month + 1] ? $signs[$month - 1] : $signs[$month % 12];
    }

    public function actors(Actor $actor)
    {
        $this->metaTitle = \Lang::get('title.actors') . ' - ' . $this->constMetaDescription;;
        $this->metaDescription = \Lang::get('title.actorsDescription');
        return view('actor.actors', [
            'actors' => $actor->getAllActors(),
            'metaTags' => $this->createMetaTags(),
        ]);
    }
}
