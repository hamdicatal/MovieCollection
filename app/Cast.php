<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    // for many to many relation with movies
    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }
}
