<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    // for mass assignment
    protected $guarded = [];

    // for default values
    protected $attributes = [
        'poster' => 'posters/default.jpeg'
    ];

    // for one to many relation with genre
    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }

    // for many to many relation with casts
    public function casts()
    {
        return $this->belongsToMany(Cast::class);
    }

    // for many to many relation with langs
    public function langs()
    {
        return $this->belongsToMany(Lang::class);
    }
}
