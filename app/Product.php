<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'name', 'photo', 'serial', 'year', 'price', 'warranty',
    'store_id', 'category_id', 'provider_id', 'state_id'
  ];

  public function event()
  {
    return $this->hasMany(Event::class);
  }

  public function event_id()
  {
    return $this->event->id;
  }

  public function provider()
  {
    return $this->belongsTo(User::class);
  }

  public function provider_id()
  {
    return $this->provider->id;
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }

  public function city_id()
  {
    return $this->city->id;
  }

  public function region()
  {
    return $this->belongsTo(Region::class);
  }

  public function region_id()
  {
    return $this->city->id;
  }

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function category_id()
  {
    return $this->category->id;
  }

  public function store()
  {
    return $this->belongsTo(Store::class);
  }

  public function store_id()
  {
    return $this->store->id;
  }

  public function order()
  {
    return $this->belongsToMany(Order::class)->withTimestamps();
  }

  public function order_id()
  {
    return $this->order->pluck('id');
  }

  public function sale()
  {
    return $this->belongsToMany(Sale::class)->withTimestamps();
  }

  public function sale_id()
  {
    return $this->sale->pluck('id');
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }

  public function state_id()
  {
    return $this->state->pluck('id');
  }

  public function cart()
  {
    return $this->belongsToMany(Cart::class)->withTimestamps();
  }

  public function cart_id()
  {
    return $this->cart->pluck('id');
  }

  public function repair()
  {
    return $this->belongsToMany(Repair::class)->withTimestamps();
  }

  public function repair_id()
  {
    return $this->repair->pluck('id');
  }
}
