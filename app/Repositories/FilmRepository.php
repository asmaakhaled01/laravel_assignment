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
                    ->whereRaw('LOWER(film.slug) LIKE "'.strtolower($slug).'"' )
                    ->select('film.id as id', 'film.name as name', 'film.photo_path', 'film.description',
                                'film.realease_date', 'film.rating', 'film.ticket_price','film.country',
                                'film.slug', 'genre.name as genre')
                    ->get()->toArray();
    }
    
    public function getFilmCommentsById($filmId){
        return \App\Models\Film::
                    leftJoin('film_comment', 'film_comment.film_id', '=', 'film.id')
                    ->where('film.id','=',$filmId)
                    ->whereNotNull('film_comment.name')
                    ->select('film_comment.name as name', 'film_comment.comment as comment')
                    ->get()->toArray();
    }
}
