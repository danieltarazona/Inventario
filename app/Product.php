<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'name', 'stock', 'photo', 'serial', 'year', 'price', 'warranty',
      'store_id', 'state_id', 'category_id', 'provider_id',
  ];

  public function provider()
  {
      return $this->belongsTo(Provider::class);
  }

  public function provider_id()
  {
      return $this->provider->id;
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

  public function state()
  {
      return $this->belongsToMany(State::class)->withTimestamps();
  }

  public function state_id()
  {
      return $this->state->lists('id');
  }

  public function cart()
  {
      return $this->belongsToMany(Cart::class)->withTimestamps();
  }

  public function cart_id()
  {
      return $this->cart->lists('id');
  }

  public function maintenance()
  {
      return $this->belongsToMany(Maintenance::class)->withTimestamps();
  }

  public function maintenance_id()
  {
      return $this->maintenance->lists('id');
  }
}
