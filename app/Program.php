<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    public function store()
    {
        return $this->belongsToMany(store::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
