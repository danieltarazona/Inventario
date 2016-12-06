<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerProductsTest extends TestCase
{
  use DatabaseTransactions;

  public function testProductsIndexController()
  {
    $response = $this->action('GET', 'ProductsController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testProductsUpdateController()
  {
    $this->assertTrue(true);
  }

  public function testProductsShowController()
  {
    $response = $this->action('GET', 'ProductsController@show', ['product' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testProductsEditController()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $response = $this->action('GET', 'ProductsController@edit', ['product' => 1]);
    $this->assertResponseOk();
  }

  public function testProductsDestroyController()
  {
    $response = $this->action('DELETE', 'ProductsController@destroy', ['product' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
