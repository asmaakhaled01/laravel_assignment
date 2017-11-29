<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Film $film
 * @property Genre $genre
 * @property int $id
 * @property int $film_id
 * @property int $genre_id
 */
class FilmGenres extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['film_id', 'genre_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function genre()
    {
        return $this->belongsTo('App\Models\Genre');
    }
}
