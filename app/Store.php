<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function sellers()
    {
        return $this->hasMany(Seller::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
