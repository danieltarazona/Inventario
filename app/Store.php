<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function region_id()
    {
        return $this->region->id;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
        return $this->city->id;
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
