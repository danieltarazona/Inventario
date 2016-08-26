<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{

  protected $fillable = [
    'name',
  ];

  public function user()
  {
    return $this->hasMany(City::class);
  }

  public function city()
  {
    return $this->hasMany(City::class);
  }

  public function store()
  {
    return $this->hasMany(Store::class);
  }

  public function name_id()
  {
    return Region::lists('name', 'id');
  }
}
