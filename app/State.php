<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

  protected $fillable = [
    'name', 'create_at', 'update_at'
  ];

  public function user()
  {
    return $this->hasMany(User::class);
  }

  public function users_id()
  {
    return $this->users->list('id');
  }

  public function product()
  {
    return $this->hasMany(Product::class);
  }

  public function product_id()
  {
    return $this->product->list('id');
  }

  public function order()
  {
    return $this->hasMany(Order::class);
  }

  public function order_id()
  {
    return $this->order->id;
  }

  public function repair()
  {
    return $this->hasMany(Repair::class);
  }

  public function repair_id()
  {
    return $this->repair->id;
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
