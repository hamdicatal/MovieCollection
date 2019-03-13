<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // for adding roles to user - admin, editor, user etc.
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    // testing for multiple roles
    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name', $roles)->first()) return true;
        else return null;
    }

    // testing for only one role
    public function hasAnyRole($role){
        if($this->roles()->where('name', $role)->first()) return true;
        else return null;
    }
}
