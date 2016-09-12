<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
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
    return $this->hasOne(Sale::class);
  }

  public function sale_id()
  {
    return $this->sale->list('id');
  }

  public function product()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();
  }

  public function product_id()
  {
    return $this->product->list('id');
  }

  public function start()
  {
    return $this->start;
  }

  public function end()
  {
    return $this->end;
  }

}
