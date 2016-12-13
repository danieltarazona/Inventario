<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

  use Searchable;

  protected $fillable = [
    'state_id', 'start', 'end', 'date', 'user_id'
  ];

  public function product()
  {
    return $this->belongsToMany(Product::class)->withTimestamps();
  }

  public function product_id()
  {
    return $this->product->pluck('id');
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
    return $this->hasOne(Sale::class);
  }

  public function sale_id()
  {
    return $this->sale->id;
  }

  public function event()
  {
    return $this->hasOne(Event::class);
  }

  public function event_id()
  {
    return $this->event->id;
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
