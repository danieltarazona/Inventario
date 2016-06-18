<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function device()
    {
        return $this->belongsToMany(Device::class);
    }
}
