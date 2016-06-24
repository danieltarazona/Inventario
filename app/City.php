<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function store()
    {
        return $this->hasMany(store::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
