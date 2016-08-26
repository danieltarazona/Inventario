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
        return $this->belongsToMany(Product::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }

    public function order_id()
    {
        return $this->order->id;
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
