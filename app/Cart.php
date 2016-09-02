<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public function product()
  {
      return $this->hasMany(Product::class);
  }

  public function order()
  {
      return $this->belongsTo(Order::class);
  }
}
