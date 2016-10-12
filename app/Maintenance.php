<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class repair extends Model
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

  public function event()
  {
    return $this->belongsTo(Event::class);
  }

  public function event_id()
  {
    return $this->event->id;
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
