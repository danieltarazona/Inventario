<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function product()
    {
        return $this->belongsToMany(Product::class);
    }

    public function product_id()
    {
        return $this->product->lists('id');
    }

    public function storer()
    {
        return $this->belongsTo(User::class);
    }

    public function storer_id()
    {
        return $this->storer->id;
    }

}
