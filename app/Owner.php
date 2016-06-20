<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function Product()
    {
        return $this->hasMany(Product::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function headquarter()
    {
        return $this->belongsTo(Headquarter::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
