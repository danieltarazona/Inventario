<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelProductTest extends TestCase
{
  public function testProductProvider()
  {
    $product = App\Product::find(1);
    $provider = App\Provider::find(1);
    $provider->product()->save($product);
    $this->seeInDatabase('products',
    [
      'id' => $product->id,
      'provider_id' => $provider->id
    ]);
  }

  public function testProductCategory()
  {
    $product = App\Product::find(1);
    $category = App\Category::find(1);
    $category->product()->save($product);
    $this->seeInDatabase('products',
    [
      'id' => $product->id,
      'category_id' => $category->id
    ]);
  }

  public function testProductStore()
  {
    $product = App\Product::find(1);
    $store = App\Store::find(1);
    $store->product()->save($product);
    $this->seeInDatabase('products',
    [
      'id' => $product->id,
      'store_id' => $store->id
    ]);
  }

  public function testProductState()
  {
    $product = App\Product::find(1);
    $state = App\State::find(1);
    $state->product()->save($product);
    $this->seeInDatabase('product_state',
    [
      'product_id' => $product->id,
      'state_id' => $state->id
    ]);
  }
}
