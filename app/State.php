<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->belongTo(User::class);
    }

    public function device()
    {
        return $this->belongTo(Device::class);
    }
}
