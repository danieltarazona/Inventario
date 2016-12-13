<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{

  use Searchable;

  protected $fillable = [
    'out', 'state_id', 'user_id', 'order_id', 'date'
  ];

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

  public function product()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();
  }

  public function product_id()
  {
    return $this->product->pluck('id');
  }

  /**
   * Get the indexable data array for the model.
   *
   * @return array
   */
  public function toSearchableArray()
  {
      $array = $this->toArray();

      // Customize array...

      return $array;
  }

}
