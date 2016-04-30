<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', [
        'as' => 'index', 'uses' => 'Index\IndexController@index'
    ]);
    Route::get('view/{slug}', [
        'as' => 'trailer', 'uses' => 'Trailer\TrailerController@view'
    ]);
    Route::get('films/{genreSlug}/{yearNumber}/{countrySlug}', [
        'as' => 'filters', 'uses' => 'Trailer\TrailerController@films'
    ]);
    Route::get('actor/{slug}', [
        'as' => 'actor', 'uses' => 'Actor\ActorController@actor'
    ]);

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
//    Route::get('/home', [
//        'as' => 'home', 'uses' => 'HomeController@index'
//    ]);
});
