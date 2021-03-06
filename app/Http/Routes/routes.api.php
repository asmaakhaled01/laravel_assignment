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


Route::group(['prefix' => 'api'], function () {
    Route::get('films', 'FilmController@listFilm');
    Route::post('films/create',[ 'as' => 'createFilmApi', 'uses' => 'FilmController@createFilm' ]);   
    Route::get('films/{slug}',  [ 'as' => 'showFilmApi', 'uses' => 'FilmController@getFilm' ]);
    Route::get('genres',[ 'as' => 'listGenresApi', 'uses' => 'GenreController@listGenres' ]);   

});

