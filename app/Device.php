<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }

    public function storer()
    {
        return $this->belongsTo(Storer::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
        ## Devices have to Many Maintenances
        ## Table device_maintenance -> device_id and maintenance_id
    }
}
