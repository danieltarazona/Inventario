<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }
}
