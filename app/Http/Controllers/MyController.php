<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class MyController extends Controller
{
    public $metaTitle = 'Sho-kino.ru - лучший пародийный онлайн кинотеатр с бесплатным легальным контентом';
    public $metaApplicationName = 'Sho-kino.ru - хорошие пародии на фильмы легально и бесплатно';
    public $metaMsApplicationTooltip = 'Sho-kino.ru - хорошие пародии на фильмы легально и бесплатно' ;
    public $metaImageSrc = '';
    public $metaDescription = 'Смотреть пародии на фильмы, сериалы, мультфильмы, шоу, передачи онлайн бесплатно и легально';
    public $constMetaDescription = 'Хорошие пародии на фильмы легально и бесплатно';

    public function myExeption($check, $code = 404, $errorMessage = '404 Page Not Found')
    {
        if ($check === null) {
            abort($code, $errorMessage);
        }
        return $check;
    }
    
    public function createMetaTags()
    {
        return '    
    <title>' . $this->metaTitle . '</title>
    <meta name="application-name"      content="' . $this->metaApplicationName . '" />
    <meta name="msapplication-tooltip" content="' . $this->metaMsApplicationTooltip . '" />
    <meta http-equiv="imagetoolbar" content="no" />

    <link rel="image_src" href="' . $this->metaImageSrc . '" /> 
    <meta name="description" content="' . $this->metaDescription . '" />
    <meta name="title" content="' . $this->metaTitle . '" />
    <meta property="og:title" content="' . $this->metaTitle . '" />
    <meta property="og:type"  content="website" />
    <meta property="og:url"         content="http://sho-kino.ru/" />
    <meta property="og:image"       content="' . $this->metaImageSrc . '" />
    <meta property="og:site_name"   content="Sho-kino" />
    <meta property="og:description" content="' . $this->metaDescription . ' " />
    ';
    }
}