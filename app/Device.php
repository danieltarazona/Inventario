<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    public function manufacturer()
    {
        return $this->belongTo(Manufacturer::class);
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

    public function maintenances()
    {
        return $this->hasMany(Maintenance::class);
    }
}
