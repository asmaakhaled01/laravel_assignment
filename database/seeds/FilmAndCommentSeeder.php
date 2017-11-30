<?php

use Illuminate\Database\Seeder;

class FilmAndCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // adding genres
        DB::table('genre')->insert(['name' => '‎Adventure']);
        
        $adventureId = DB::getPdo()->lastInsertId();
        
        DB::table('genre')->insert([
            'name' => '‎Comedy'
        ]);
        
        $comdeyId = DB::getPdo()->lastInsertId();
        
        DB::table('genre')->insert([
            'name' => '‎Animation'
        ]);
        
        $animationId = DB::getPdo()->lastInsertId();
        
        // film1 
        // adding film
        DB::table('film')->insert([
            'name' => '‎Comedy1',
            'description' => '‎Comedy ‎Comedy',
            'realease_date'=> '2016-09-08',
            'rating'=> '3',
            'ticket_price'=> '25.5',
            'country'=> 'US',
            'slug'=> 'Comedy1',
            'photo_path'=> 'demo1.jpg'
        ]);
        
        $filmId = DB::getPdo()->lastInsertId();
        
        //adding film genre
        DB::table('film_genres')->insert([
            'film_id' => $filmId,
            'genre_id' => $comdeyId
        ]);
        // adding film comment 
        DB::table('film_comment')->insert([
            'film_id' => $filmId,
            'name' => 'user1',
            'comment' => 'user1 comment'
        ]);
        
        // film2
        // adding film
        DB::table('film')->insert([
            'name' => '‎animationAdventure1',
            'description' => '‎Animation Adventure',
            'realease_date'=> '2017-10-08',
            'rating'=> '5',
            'ticket_price'=> '25.5',
            'country'=> 'US',
            'slug'=> 'animationAdventure1',
            'photo_path'=> 'demo2.jpg'
        ]);
        
        $filmId = DB::getPdo()->lastInsertId();
        
        //adding film genres
        DB::table('film_genres')->insert([
            'film_id' => $filmId,
            'genre_id' => $animationId
        ]);
                
        DB::table('film_genres')->insert([
            'film_id' => $filmId,
            'genre_id' => $adventureId
        ]);
        
        // adding film comment 
        DB::table('film_comment')->insert([
            'film_id' => $filmId,
            'name' => 'user1',
            'comment' => 'user1 comment'
        ]);
        
        // film3
        // adding film
        DB::table('film')->insert([
            'name' => '‎animationComedy1',
            'description' => '‎Animation Comedy',
            'realease_date'=> '2017-03-07',
            'rating'=> '4',
            'ticket_price'=> '27.5',
            'country'=> 'US',
            'slug'=> 'animationComedy1',
            'photo_path'=> 'demo3.jpg'
        ]);
        
        $filmId = DB::getPdo()->lastInsertId();
        
        //adding film genres
        DB::table('film_genres')->insert([
            'film_id' => $filmId,
            'genre_id' => $animationId
        ]);
                
        DB::table('film_genres')->insert([
            'film_id' => $filmId,
            'genre_id' => $comdeyId
        ]);
        
       // adding film comment 
        DB::table('film_comment')->insert([
            'film_id' => $filmId,
            'name' => 'user2',
            'comment' => 'user2 comment'
        ]);
    }
}
