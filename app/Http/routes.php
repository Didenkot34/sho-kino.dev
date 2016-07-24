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
    Route::any('add-comment', [
        'as' => 'addComment', 'uses' => 'Comment\CommentController@addComment'
    ]);
    Route::any('signIn', [
        'as' => 'signIn', 'uses' => 'Auth\AuthAjaxController@signIn'
    ]);
    Route::any('signUp', [
        'as' => 'signUp', 'uses' => 'Auth\AuthAjaxController@signUp'
    ]);
    Route::post('search', [
        'as' => 'search', 'uses' => 'Search\SearchController@searchPost'
    ]);
    Route::get('search', [
        'as' => 'search', 'uses' => 'Search\SearchController@searchGet'
    ]);

});

Route::group(['middleware' => 'web'], function () {
    Route::auth();
//    Route::get('/home', [
//        'as' => 'home', 'uses' => 'HomeController@index'
//    ]);
});
