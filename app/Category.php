<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
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
    return Category::lists('name', 'id');
  }
}
