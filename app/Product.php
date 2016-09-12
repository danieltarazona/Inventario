<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
    'name', 'stock', 'photo', 'serial', 'year', 'price', 'warranty',
    'store_id', 'category_id', 'provider_id',
  ];

  public function provider()
  {
    return $this->belongsTo(Provider::class);
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
    return $this->belongsToMany(Order::class)->withPivot('quantity')->withTimestamps();
  }

  public function order_id()
  {
    return $this->order->lists('id');
  }

  public function state()
  {
    return $this->belongsToMany(State::class)->withPivot('quantity')->withTimestamps();
  }

  public function state_id()
  {
    return $this->state->lists('id');
  }

  public function cart()
  {
    return $this->belongsToMany(Cart::class)->withPivot('quantity')->withTimestamps();
  }

  public function cart_id()
  {
    return $this->cart->lists('id');
  }

  public function quantity()
  {
    return $this->pivot->quantity;
  }

  public function maintenance()
  {
    return $this->belongsToMany(Maintenance::class)->withPivot('quantity')->withTimestamps();
  }

  public function maintenance_id()
  {
    return $this->maintenance->lists('id');
  }
}
