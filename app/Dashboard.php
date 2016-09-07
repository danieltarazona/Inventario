<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dashboard extends Model
{
    public function stats()
    {
        return $this->hasMany(Stat::class);
    }
}
