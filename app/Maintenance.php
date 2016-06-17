<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function devices()
    {
        return $this->HasMany(Device::class);
    }

    public function storer()
    {
        return $this->hasOne(Storer::class);
    }
}
