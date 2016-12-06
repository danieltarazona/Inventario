<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerCitiesTest extends TestCase
{
  use DatabaseTransactions;

  public function testCitiesIndexController()
  {
    $response = $this->action('GET', 'CitiesController@index');
    $this->assertResponseOk();
  }

  public function testCitiesStoreController()
  {
    $this->assertEquals(true);
  }

  public function testCitiesUpdateController()
  {
    $this->assertEquals(true);
  }

  public function testCitiesEditController()
  {
    $response = $this->action('GET', 'CitiesController@edit', ['city' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testCitiesDestroyController()
  {
    $response = $this->action('DELETE', 'CitiesController@destroy', ['city' => 1]);
    $this->assertEquals(302, $response->status());
  }

}
