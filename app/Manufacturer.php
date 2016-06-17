<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Manufacturer extends Model
{
    public function devices()
    {
        return $this->hasMany(Device::class);
    }
}
