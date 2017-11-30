<?php

namespace App\Services;

use App\Utility\Enum\LogFilesEnum;

class GenreService {
    
    private $genreRepository;
    
    public function __construct($genreRepository) {
        $this->genreRepository = $genreRepository;
    }
    
    public function getAllGenres(){
        $response = FALSE;
        try{
            $response = $this->genreRepository->getAllGenres();
        }  catch (\Exception $exc){
           app('logger')->addError("GenreService:getAllGenres Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }
    
    public function validGenreIds($genresIds){
        $response = FALSE;
        try{
            $givenGenreIds = array_filter(explode(',', $genresIds));
            $existGenreIds = $this->genreRepository->findGenresByIds($givenGenreIds);
            if(count($givenGenreIds) == count($existGenreIds)){
                $response = TRUE;  
            }
        }  catch (\Exception $exc){
           app('logger')->addError("GenreService:validGenreIds Exception ".$exc->getMessage() ,LogFilesEnum::$WEBSERVICE); 
        }
        return $response;
    }

    
}


