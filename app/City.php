<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function headquarters()
    {
        return $this->hasMany(Headquarter::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
