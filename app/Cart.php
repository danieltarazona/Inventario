<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public function product()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();
  }

  public function product_id()
  {
    return $this->product->pluck('id');
  }

  public function order()
  {
    return $this->hasOne(Order::class);
  }

  public function order_id()
  {
    return $this->order->id;
  }

  public function repair()
  {
    return $this->hasOne(Repair::class);
  }

  public function repair_id()
  {
    return $this->order->id;
  }

  public function user()
  {
    return $this->hasOne(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }
}
