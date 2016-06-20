<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
        // Maintenance has Many Devices
    }

    public function owner()
    {
        return $this->hasOne(Owner::class);
    }
}
