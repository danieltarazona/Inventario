<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function city()
    {
        return $this->hasMany(City::class);
    }

    public function store()
    {
        return $this->hasMany(Store::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
