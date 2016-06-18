<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
