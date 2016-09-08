<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
  protected $table = 'roles';

  public function user()
  {
      return $this->hasMany(User::class);
  }

  public function user_id()
  {
      return $this->users->list('id');
  }
}
