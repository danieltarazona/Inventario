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
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
      return $this->city->id;
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function store_id()
    {
        return $this->store->id;
    }

    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function state_id()
    {
        return $this->state->id;
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function region_id()
    {
        return $this->region->id;
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
