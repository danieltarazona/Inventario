<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function devices()
    {
        return $this->belongToMany(Device::class);
    }

    public function storer()
    {
        return $this->belongTo(Storer::class);
    }
}
