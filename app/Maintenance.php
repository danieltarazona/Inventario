<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'name', 'price', 'description', 'seller_id',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function product_id()
    {
        return $this->product->lists('id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }

}
