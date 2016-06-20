<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->belongsToMany(User::class);
    }

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }
}
