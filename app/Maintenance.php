<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function device()
    {
        return $this->hasMany(Device::class);
        // Maintenance has Many Devices 
    }

    public function storer()
    {
        return $this->hasOne(Storer::class);
    }
}
