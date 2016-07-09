<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seller extends Model

{
  public function products()
  {
    return $this->hasMany(Product::class);
  }

  public function maintenances()
  {
    return $this->hasMany(Maintenance::class);
  }

  public function sales()
  {
    return $this->hasMany(Sale::class);
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function store()
  {
    return $this->belongsTo(Store::class);
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
