<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
