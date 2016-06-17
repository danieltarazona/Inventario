<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    public function device()
    {
        return $this->hasMany(Device::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storer()
    {
        return $this->belongsTo(Storer::class);
    }
}
