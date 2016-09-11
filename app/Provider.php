<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
  protected $fillable = [
    'name', 'telephone', 'adress',
  ];

  public function product()
  {
    return $this->hasMany(Product::class);
  }

  public function product_id()
  {
    return $this->product->list('id');
  }

  public function name_id()
  {
    return Provider::lists('name', 'id');
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function user_id()
  {
    return $this->user->id;
  }
}
