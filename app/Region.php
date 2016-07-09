<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function stores()
    {
        return $this->hasMany(Store::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

}
