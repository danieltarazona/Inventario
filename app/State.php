<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function users_id()
    {
        return $this->users->list('id');
    }

    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function product_id()
    {
        return $this->product->list('id');
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function order_id()
    {
        return $this->order->id;
    }

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }

    public function maintenance_id()
    {
        return $this->maintenance->id;
    }

    public function sale()
    {
        return $this->hasMany(Sale::class);
    }

    public function sale_id()
    {
        return $this->sale->list('id');
    }

    public function name_id()
    {
      return State::lists('name', 'id');
    }
}
