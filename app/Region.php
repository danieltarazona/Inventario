<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

  protected $fillable = [
    'name',
  ];

  public function city()
  {
    return $this->hasMany(City::class);
  }

  public function stores()
  {
    return $this->hasMany(Store::class);
  }

  public function name_id()
  {
    return Region::lists('name', 'id');
  }
}
