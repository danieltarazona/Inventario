<?php

namespace App;

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

  /*
  protected $casts = [
  'is_admin' => 'boolean',
  'is_seller' => 'boolean',
];
*/

/**
* The attributes that should be hidden for arrays.
*
* @var array
*/
protected $hidden = [
  'password', 'remember_token',
];

public function cart()
{
  return $this->hasMany(Cart::class);
}

public function cart_id()
{
  return $this->cart->list('id');
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
  return $this->sale->list('id');
}

public function order()
{
  return $this->hasMany(Order::class);
}

public function order_id()
{
  return $this->order->list('id');
}

public function comment()
{
  return $this->hasMany(Comment::class);
}

public function comment_id()
{
  return $this->comment->list('id');
}

public function issue()
{
  return $this->hasMany(Issue::class);
}

public function issue_id()
{
  return $this->issue->list('id');
}

public function maintenance()
{
  return $this->hasMany(Maintenance::class);
}

public function maintenance_id()
{
  return $this->maintenance->list('id');
}

public function rol()
{
  return $this->belongsTo(Rol::class);
}

public function rol_id()
{
  return $this->rol->id;
}

public function rol_name()
{
  return $this->rol->name;
}

public function isUser()
{
  if ($this->rol_id() == 2)
  {
    return True;
  } else {
    return False;
  }
}

public function isStorer()
{
  if ($this->rol_id() == 3)
  {
    return True;
  } else {
    return False;
  }
}

public function isAdmin()
{
  if ($this->rol_id() == 1)
  {
    return True;
  } else {
    return False;
  }
}

}
