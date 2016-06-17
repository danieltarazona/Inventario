<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function headquarters()
    {
        return $this->belongsToMany(Headquarter::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
