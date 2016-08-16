<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = [
      'name', 'stock', 'serial', 'year', 'price', 'warranty',
      'region_id', 'city_id', 'store_id', 'state_id',
      'category_id', 'provider',
  ];

  public function city()
  {
      return $this->belongsTo(City::class);
  }

  public function city_id()
  {
      return $this->city->id;
  }

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

  public function seller()
  {
      return $this->belongsTo(Seller::class);
  }

  public function state()
  {
      return $this->belongsTo(State::class);
  }

  public function state_id()
  {
      return $this->state->id;
  }

  public function sales()
  {
      return $this->belongsToMany(Sale::class)->withTimestamps();
  }

  public function orders()
  {
      return $this->belongsToMany(Order::class)->withTimestamps();
  }

  public function maintenances()
  {
      return $this->belongsToMany(Maintenance::class);
  }

  public function maintenance_id()
  {
      return $this->maintenance->lists('id');
  }
}
