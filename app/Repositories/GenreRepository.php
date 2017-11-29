<?php

namespace App\Repositories;

class GenreRepository {
    
    public function getAllGenres(){
        return \App\Models\Genre::all()->toArray();

    }
    
    
    public function findGenresByIds($ids){
        return \App\Models\Genre::whereIn('genre.id',$ids)
                    ->select('genre.id as id')
                    ->get()->toArray();
    }
}
