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

    protected $casts = [
       'is_admin' => 'boolean',
       'is_seller' => 'boolean',
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

    public function sales()
    {
        return $this->hasMany(Sale::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function issues()
    {
        return $this->hasMany(Issue::class);
    }

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function rol()
    {
      return $this->belongsTo(Rol::class);
    }

    public function rol_id()
    {
      return $this->rol->id;
    }

    public function isSeller()
    {
      if ($this->rol->id == 2) {
        return true;
      } else {
        return false;
      }
    }

    public function isAdmin()
    {
      if ($this->rol->id == 3) {
        return true;
      } else {
        return false;
      }
    }

}
