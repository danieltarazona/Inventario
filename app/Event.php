<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }

  public function order()
  {
    return $this->belongsTo(Order::class);
  }

  public function order_id()
  {
    return $this->order->id;
  }

  public function product()
  {
    return $this->belongsTo(Product::class);
  }

  public function product_id()
  {
    return $this->product->id;
  }
}
