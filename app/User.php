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
        'username', 'dni', 'email', 'password', 'city_id', 'state_id',
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
        return $this->belongsTo(City::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function issue()
    {
        return $this->hasMany(Issue::class);
    }

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }

    public function admin()
    {
        return $this->hasOne(Admin::class);
    }
}
