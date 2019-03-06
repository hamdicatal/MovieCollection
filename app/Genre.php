<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    // for mass assignment
    protected $guarded = [];

    // for one to many relation with movies
    public function movies()
    {
        return $this->hasMany(Movie::class);
    }
}
