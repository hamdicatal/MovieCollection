<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    // for adding users to roles
    public function users() {
        return $this->belongsToMany(User::class);
    }
}
