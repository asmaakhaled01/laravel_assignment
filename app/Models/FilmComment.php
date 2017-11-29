<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property Film $film
 * @property int $id
 * @property int $film_id
 * @property string $name
 * @property string $comment
 */
class FilmComment extends Model
{
    /**
     * The table associated with the model.
     * 
     * @var string
     */
    protected $table = 'film_comment';

    /**
     * @var array
     */
    protected $fillable = ['film_id', 'name', 'comment'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function film()
    {
        return $this->belongsTo('App\Models\Film');
    }
}
