<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // for many to many relation with users table
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
