<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;



class GenreController extends Controller {
    
    public function listGenres(){
        $response = ['status' => FALSE , 'data' => NULL ];
        $result = app('genreService')->getAllGenres();
        if($result){
            $response = ['status' => TRUE , 'data' => $result ];  
        }
        return response()->json($response);
    }
}