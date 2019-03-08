<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lang extends Model
{
    // for mass assignment
    protected $guarded = [];

    // for many to many relation with movies
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
