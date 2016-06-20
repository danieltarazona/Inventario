<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Headquarter extends Model
{
    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function storer()
    {
        return $this->hasMany(Storer::class);
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
