<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  protected $fillable = [
    'state_id', 'start', 'end', 'date', 'user_id'
  ];

  public function event()
  {
    return $this->hasMany(Event::class);
  }

  public function event_id()
  {
    return $this->event->id;
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

}
