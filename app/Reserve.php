<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    public function device()
    {
        return $this->hasMany(Device::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
