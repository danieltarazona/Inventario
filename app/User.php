<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'dni', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function city()
    {
        return $this->hasOne(City::class);
    }

    public function program()
    {
        return $this->hasOne(Program::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function issue()
    {
        return $this->hasMany(Issue::class);
    }

}
