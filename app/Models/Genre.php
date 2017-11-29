<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property FilmGenre[] $filmGenres
 * @property int $id
 * @property string $name
 */
class Genre extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'genre';

    /**
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function filmGenres()
    {
        return $this->hasMany('App\Models\FilmGenre');
    }
}
