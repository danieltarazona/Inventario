<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function manufacturer()
    {
        return $this->hasOne(Manufacturer::class);
    }

    public function category()
    {
        return $this->hasOne(Category::class);
    }

    public function headquarter()
    {
        return $this->hasOne(Headquarter::class);
    }

    public function storer()
    {
        return $this->hasOne(Storer::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
