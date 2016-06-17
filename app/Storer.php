<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storer extends Model
{
    public function devices()
    {
        return $this->hasMany(Device::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function loans()
    {
        return $this->hasMany(Loan::class);
    }
}
