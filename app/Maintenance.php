<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    public function product()
    {
        return $this->belongsToMany(Product::class)->withTimestamps();
    }

    public function product_id()
    {
        return $this->product->lists('id');
    }

    public function owner()
    {
        return $this->belongsTo(Owner::class);
    }

}
