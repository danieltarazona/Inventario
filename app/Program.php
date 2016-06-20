<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function headquarter()
    {
        return $this->belongsToMany(Headquarter::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
