<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function user_id()
    {
        return $this->user->id;
    }
}
