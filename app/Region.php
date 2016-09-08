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

  public function user_id()
  {
    return $this->user->list('id');
  }

  public function city()
  {
    return $this->hasMany(City::class);
  }

  public function city_id()
  {
    return $this->city->list('id');
  }

  public function store()
  {
    return $this->hasMany(Store::class);
  }

  public function store_id()
  {
    return $this->store->list('id');
  }

  public function name_id()
  {
    return Region::all()->lists('name', 'id');
  }
}
