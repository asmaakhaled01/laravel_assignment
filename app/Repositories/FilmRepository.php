<?php

namespace App\Repositories;

class FilmRepository {
    
    public function getAllFilmsWithGenres(){
        return \App\Models\Film::
                    leftJoin('film_genres', 'film_genres.film_id', '=', 'film.id')
                    ->leftJoin('genre', 'film_genres.genre_id', '=', 'genre.id')
                    ->select('film.id as id', 'film.name as name', 'film.photo_path', 
                             'film.slug', 'genre.name as genre')
                    ->get()->toArray();
    }
    
    
    public function getFilmDetailsBySlug($slug){
        return \App\Models\Film::
                    leftJoin('film_genres', 'film_genres.film_id', '=', 'film.id')
                    ->leftJoin('genre', 'film_genres.genre_id', '=', 'genre.id')
                    ->where('film.slug','=',$slug)
                    ->select('film.id as id', 'film.name as name', 'film.photo_path', 'film.description',
                                'film.realease_date', 'film.rating', 'film.ticket_price','film.country',
                                'film.slug', 'genre.name as genre')
                    ->get()->toArray();
    }
}
