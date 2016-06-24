<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function owner()
    {
        return $this->hasMany(Owner::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
