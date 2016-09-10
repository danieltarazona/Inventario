<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
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

  public function state()
  {
    return $this->belongsTo(State::class);
  }

  public function state_id()
  {
    return $this->state->id;
  }

}
