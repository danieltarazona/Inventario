<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
