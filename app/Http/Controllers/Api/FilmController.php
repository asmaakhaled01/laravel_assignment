<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class FilmController extends Controller {
    
    public function listFilm(){
        $response = ['status' => FALSE , 'data' => NULL ];
        $result = app('filmService')->getAllFilms();
        if($result){
            $response = ['status' => TRUE , 'data' => $result ];  
        }
        return response()->json($response);
    }
    
    public function getFilm(Request $request){
        $response = ['status' => FALSE , 'data' => NULL ];
        $result = app('filmService')->getFilmDetailsBySlug($request->slug);
        if($result){
            $response = ['status' => TRUE , 'data' => $result ];  
        }
        return response()->json($response);
    }
    
    public function createFilm(Request $request){
        $response = ['status' => FALSE , 'data' => NULL ];
        $validGenre = TRUE;
        $validFilm = app('filmValidator')->validFilm($request->all());
        if($request->genres){
            $validGenre = app('genreService')->validGenreIds($request->genres);
        }
        if($validFilm && $validGenre){
            $result = app('filmService')->createFilm($request);
            if($result){
                $response = ['status' => TRUE , 'data' => $result ];  
            }
        }
        return response()->json($response);
    }
    
}
