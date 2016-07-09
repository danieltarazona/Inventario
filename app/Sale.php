<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

}
