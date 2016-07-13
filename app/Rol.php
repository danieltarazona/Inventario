<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  public function users()
  {
      return $this->hasMany(User::class);
  }

  public function users_id()
  {
      return $this->users->list('id');
  }
}
