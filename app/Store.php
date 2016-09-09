<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function product_id()
    {
        return $this->product->list('id');
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
        return $this->city->id;
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function user_id()
    {
        return $this->user->list('id');
    }

    public function name_id()
    {
      return Store::lists('name', 'id');
    }

}
