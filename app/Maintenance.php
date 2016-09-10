<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
  protected $fillable = [
    'name', 'description',
  ];

  public function product()
  {
    return $this->belongsToMany(Product::class)->withPivot('quantity');
  }

  public function product_id()
  {
    return $this->product->lists('id');
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

}
