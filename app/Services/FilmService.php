<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Utility\Enum\LogFilesEnum;


class FilmService {
    
    private $filmRepository;
    
    public function __construct($filmRepository) {
        $this->filmRepository = $filmRepository;
    }
    
    public function getAllFilms(){
        $response = FALSE;
        try{
            $response = $this->formateFilmswithGenres($this->filmRepository->getAllFilmsWithGenres());
        }  catch (\Exception $exc){
           app('logger')->addError("FilmService:getAllFilms Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }
    
    public function getFilmDetailsBySlug($slug){
        
        $response = array();
        try{
            $films =$this->formateFilmswithGenres($this->filmRepository->getFilmDetailsBySlug($slug));
            if($films){
             $response = $films[0];   
            }
        }  catch (\Exception $exc){
           app('logger')->addError("FilmService:getFilmDetailsBySlug Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }

    public function createFilm(Request $requestData){
        $response = FALSE;
        try{
            $film = new \App\Models\Film();
            $film->name = $requestData->name;
            $film->description = $requestData->description;
            $film->realease_date = $requestData->realease_date;
            $film->rating = $requestData->rating;
            $film->ticket_price = $requestData->ticket_price;
            $film->country = $requestData->country;
            $film->slug = $requestData->slug;
            
            $image      = $requestData->file('photo');
            $fileContent = file_get_contents($image->getRealPath());
            $fileName   = $requestData->slug. '.' . $image->getClientOriginalExtension();
            \Illuminate\Support\Facades\Storage::disk('local')->put('films_images/'.$fileName, $fileContent);

            $film->photo_path = $fileName;
            $film->save();
            
            $this->createFilmGenre($film, $requestData->genres);
            
            $response = TRUE;          
        }  catch (\Exception $exc){
           app('logger')->addError("FilmService:createFilm Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }

    public function createFilmGenre($film,$genres){
        $response = FALSE; 
        try{
            $genresIds = array_filter(explode(',', $genres));
            
            foreach ($genresIds as $genreId) {
                $filmGenre = new \App\Models\FilmGenres();
                $filmGenre->film_id = $film->id;
                $filmGenre->genre_id = $genreId;
                $filmGenre->save();
            }
            
            $response = TRUE;          
        }  catch (\Exception $exc){
           app('logger')->addError("FilmService:createFilmGenre Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }

    private function formateFilmswithGenres($films){
        $formatedFilms = [];
        foreach ($films as $film) {
            $genre = $film['genre'];
            unset($film['genre']);
            
            if ( array_key_exists($film['id'], $formatedFilms) ){// not first genre for that film
                $selectedFilm = $formatedFilms[$film['id']];
                $selectedFilm['genres'][] = $genre;
                 $formatedFilms[$film['id']] = $selectedFilm;
                
            }else{//first genre for that film
                $film['genres']= [$genre];
                $formatedFilms[$film['id']] = $film;
            }
        }
        return array_values($formatedFilms);
    }
    
}

