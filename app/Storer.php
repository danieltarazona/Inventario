<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storer extends Model
{
    public function device()
    {
        return $this->hasMany(Device::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function loan()
    {
        return $this->hasMany(Loan::class);
    }

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }

    public function reserve()
    {
        return $this->hasMany(Reserve::class);
    }
}
