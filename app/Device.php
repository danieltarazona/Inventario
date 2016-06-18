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
        return $this->belongsTo(State::class);
    }

    public function maintenance()
    {
        return $this->belongsToMany('App\Maintenance', 'devices_maintenances', 'device_id', 'maintenance_id');
    }
}
