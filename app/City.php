<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function headquarter()
    {
        return $this->hasMany(Headquarter::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
