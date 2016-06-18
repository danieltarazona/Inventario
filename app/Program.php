<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function city()
    {
        return $this->belongsToMany(City::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
