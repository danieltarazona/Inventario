<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    public function stores()
    {
        return $this->hasMany(store::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
