<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Auth;

/*
class ProductsTest extends TestCase
{
  use DatabaseTransactions;

  public function testProductsIndexController()
  {
    $auth = Auth::user();
    $this->be($auth);
    $response = $this->action('GET', 'ProductsController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testProductsUpdateController()
  {
    $response = $this->action('PUT', 'ProductsController@update', ['product' => 1, 'name' => 'iMac']);
    $this->assertEquals(200, $response->status());
  }

  public function testProductsShowController()
  {
    $response = $this->action('GET', 'ProductsController@show', ['product' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testProductsEditController()
  {
    $admin = App\User::find(3);
    $this->be($admin);

    $response = $this->action('GET', 'ProductsController@edit', ['product' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testProductsDestroyController()
  {
    $product = App\Product::find(1);
    $response = $this->action('DELETE', 'ProductsController@destroy', $product->id);
    $this->assertEquals(302, $response->status());
  }
}
