<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */
  protected $fillable = [
    'username', 'dni', 'email', 'password',
  ];

  protected $casts = [
    'isAdmin' => 'boolean',
    'isSeller' => 'boolean',
  ];

  /**
  * The attributes that should be hidden for arrays.
  *
  * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  public function product()
  {
    return $this->hasMany(Product::class, 'provider_id');
  }

  public function product_id()
  {
    return $this->product->id;
  }

  public function cart()
  {
    return $this->belongsTo(Cart::class);
  }

  public function cart_id()
  {
    return $this->cart->id;
  }

  public function city()
  {
    return $this->belongsTo(City::class);
  }

  public function city_id()
  {
    return $this->city->id;
  }

  public function store()
  {
    return $this->belongsTo(store::class);
  }

  public function store_id()
  {
    return $this->store->id;
  }

  public function state()
  {
    return $this->belongsTo(State::class);
  }

  public function state_id()
  {
    return $this->state->id;
  }

  public function region()
  {
    return $this->belongsTo(Region::class);
  }

  public function region_id()
  {
    return $this->region->id;
  }

  public function sale()
  {
    return $this->hasMany(Sale::class);
  }

  public function sale_id()
  {
    return $this->sale->pluck('id');
  }

  public function order()
  {
    return $this->hasMany(Order::class);
  }

  public function order_id()
  {
    return $this->order->pluck('id');
  }

  public function comment()
  {
    return $this->hasMany(Comment::class);
  }

  public function comment_id()
  {
    return $this->comment->pluck('id');
  }

  public function issue()
  {
    return $this->hasMany(Issue::class);
  }

  public function issue_id()
  {
    return $this->issue->pluck('id');
  }

  public function event()
  {
    return $this->hasMany(Event::class);
  }

  public function event_id()
  {
    return $this->event->pluck('id');
  }

  public function repair_provider()
  {
    return $this->hasMany(Repair::class, 'provider_id');
  }

  public function repair_storer()
  {
    return $this->hasMany(Repair::class, 'storer_id');
  }

  public function role()
  {
    return $this->belongsTo(Role::class);
  }

  public function role_id()
  {
    return $this->role->id;
  }

  public function role_name()
  {
    return $this->role->name;
  }

  public function isUser()
  {
    if ($this->role_id() == 2)
    {
      return True;
    } else {
      return False;
    }
  }

  public function isStorer()
  {
    if ($this->role_id() == 3)
    {
      return True;
    } else {
      return False;
    }
  }

  public function isAdmin()
  {
    if ($this->role_id() == 1)
    {
      return True;
    } else {
      return False;
    }
  }
}
