<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    public function programs()
    {
        return $this->hasMany(Program::class);
    }

    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }
}
