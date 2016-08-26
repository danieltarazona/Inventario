<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Auth;

/*
class ProductsControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testProductsIndexController()
  {
    $response = $this->action('GET', 'ProductsController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testProductsUpdateController()
  {
    $response = $this->action('PATCH', 'ProductsController@update', ['product' => 1, 'name' => 'iMac']);
    $this->assertEquals(302, $response->status());
  }

  public function testProductsShowController()
  {
    $response = $this->action('GET', 'ProductsController@show', ['product' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testProductsEditController()
  {
    $response = $this->action('GET', 'ProductsController@edit', ['product' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testProductsDestroyController()
  {
    $response = $this->action('DELETE', 'ProductsController@destroy', ['product' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
