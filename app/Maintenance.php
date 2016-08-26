<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function products_id()
    {
        return $this->products->lists('id');
    }

    public function storer()
    {
        return $this->belongsTo(User::class);
    }

    public function storer_id()
    {
        return $this->seller->id;
    }

}
