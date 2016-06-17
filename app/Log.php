<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function dashboard()
    {
        return $this->belongsTo(Dashboard::class);
    }
}
