<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function headquarters()
    {
        return $this->hasMany(Headquarter::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
