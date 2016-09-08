<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  public function cart()
  {
    return $this->belongsTo(Cart::class);
  }

  public function cart_id()
  {
    return $this->cart->id;
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }

  public function state_id()
  {
    return $this->state->id;
  }

  public function sale()
  {
    return $this->hasMany(Sale::class);
  }

  public function sale_id()
  {
    return $this->sale->list('id');
  }

}
