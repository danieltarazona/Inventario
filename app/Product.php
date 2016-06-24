<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function city_id()
    {
        return $this->city->id;
    }

    public function manufacturer()
    {
        return $this->belongsTo(Manufacturer::class);
    }

    public function manufacturer_id()
    {
        return $this->manufacturer->id;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function category_id()
    {
        return $this->category->id;
    }

    public function store()
    {
        return $this->belongsTo(store::class);
    }

    public function store_id()
    {
        return $this->store->id;
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
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
        return $this->belongsToMany(Sale::class)->withTimestamps();
    }

    public function order()
    {
        return $this->belongsToMany(Order::class)->withTimestamps();
    }

    public function maintenance()
    {
        return $this->belongsToMany(Maintenance::class)->withTimestamps();
        ## Products have to Many Maintenances
        ## Table device_maintenance -> device_id and maintenance_id
    }

    public function maintenance_id()
    {
        return $this->maintenance->lists('id');
    }
}
