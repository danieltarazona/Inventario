<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
  protected $fillable = [
    'name', 'description',
  ];

  public function provider()
  {
    return $this->belongsTo(User::class);
  }

  public function provider_id()
  {
    return $this->provider->id;
  }

  public function product()
  {
    return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
  }

  public function product_id()
  {
    return $this->product->lists('id');
  }

  public function storer()
  {
    return $this->belongsTo(User::class);
  }

  public function storer_id()
  {
    return $this->storer->id;
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
