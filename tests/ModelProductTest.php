<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelProductTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelProductCategory()
  {
    $product = App\Product::find(1);
    $this->assertInstanceOf(App\Category::class, $product->category);
  }

  public function testModelProductStore()
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

  public function testModelProductOrder()
  {
    $products = factory(App\Product::class, 10)->create();
    $cart = factory(App\Cart::class)->create();
    $cart->product()->sync($products);
    $this->seeInDatabase('cart_product',
    [
      'cart_id' => $cart->id,
    ]);
  }

  public function testModelProductRepair()
  {
    $products = factory(App\Product::class, 10)->create();
    $repair = App\Repair::find(1);
    $repair->product()->sync($products);
    $this->seeInDatabase('product_repair',
    [
      'repair_id' => $repair->id,
    ]);
  }
}
