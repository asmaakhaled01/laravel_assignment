<?php

namespace App\Validators;
use Validator;

class FilmValidator {

    public function validFilm($requestData){
        $valid = TRUE;   
        $validator = Validator::make($requestData,[
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'realease_date' => 'required|date',
            'rating' => 'required|integer|between:1,5',  
            'ticket_price' => 'required|numeric', 
            'country' => 'required|max:255',
            'slug' => 'required|max:255',
            'photo' => 'required|image'
        ]);
        
        if ($validator->fails()) {
            $valid = FALSE;
        }
        
        return $valid;
    }
    
}
