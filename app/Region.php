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
    return $this->user->pluck('id');
  }

  public function city()
  {
    return $this->hasMany(City::class);
  }

  public function city_id()
  {
    return $this->city->pluck('id');
  }

  public function store()
  {
    return $this->hasMany(Store::class);
  }

  public function store_id()
  {
    return $this->store->pluck('id');
  }

  public function product()
  {
      return $this->hasMany(User::class);
  }

  public function product_id()
  {
      return $this->product->pluck('id');
  }

  public function name_id()
  {
    return Region::pluck('name', 'id');
  }
}
