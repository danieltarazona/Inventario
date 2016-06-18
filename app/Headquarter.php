<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function device()
    {
        return $this->hasMany(Device::class);
    }

    public function storer()
    {
        return $this->hasMany(Storer::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
