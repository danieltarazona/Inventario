<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function device()
    {
        return $this->hasMany(Device::class);
    }
}
