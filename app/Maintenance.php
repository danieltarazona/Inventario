<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function storer()
    {
        return $this->hasOne(Storer::class);
    }
}
