<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
        return $this->city->id;
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
