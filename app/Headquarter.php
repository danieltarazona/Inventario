<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    public function program()
    {
        return $this->belongsToMany(Program::class)->withTimestamps();
    }

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
