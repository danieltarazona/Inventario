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
    $city = factory(\App\City::class)->create(['name' => 'Tokyo']);
    $response = $this->action('POST',
      'CitiesController@store',
      $city->jsonSerialize()->name
    );
    $this->seeInDatabase('cities', ['name' => $city->name]);
    $this->assertSessionHas('flash', 'success');
    $this->assertEquals(302, $response->status());
  }

  public function testCitiesUpdateController()
  {
    $city = App\City::first();
    $city->name = "Paris";
    $response = $this->action(
      'PATCH', 'CitiesController@update',
      ['cities' => $city->id],
      $city->jsonSerialize()
    );
    $this->seeInDatabase('cities', ['name' => $city->name]);
    $this->assertSessionHas('flash', 'success');
    $this->assertEquals(302, $response->status());
  }

  public function testCitiesEditController()
  {
    $response = $this->action('GET', 'CitiesController@edit', ['city' => 1]);
    $this->assertResponseOk();
  }

  public function testCitiesDestroyController()
  {
    $response = $this->action('DELETE', 'CitiesController@destroy', ['city' => 1]);
    $this->assertEquals(302, $response->status());
  }

}
