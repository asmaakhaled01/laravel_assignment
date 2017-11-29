<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property FilmComment[] $filmComments
 * @property FilmGenre[] $filmGenres
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $realease_date
 * @property boolean $rating
 * @property float $ticket_price
 * @property string $country
 * @property string $slug
 * @property string $photo_path
 */
class Film extends Model
{
    public $timestamps = FALSE;
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'film';

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'realease_date', 'rating', 'ticket_price', 'country', 'slug', 'photo_path'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filmComments()
    {
        return $this->hasMany('App\Models\FilmComment');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filmGenres()
    {
        return $this->hasMany('App\Models\FilmGenre');
    }
}
