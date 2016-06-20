<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
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

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

    public function state()
    {
        return $this->hasOne(State::class);
    }

    public function sale()
    {
        return $this->belongsToMany(Sale::class);
    }

    public function order()
    {
        return $this->belongsToMany(Order::class);
    }

    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class);
        ## Devices have to Many Maintenances
        ## Table device_maintenance -> device_id and maintenance_id
    }
}
