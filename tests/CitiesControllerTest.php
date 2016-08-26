<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*
class CitiesControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testCitiesIndexController()
  {
    $response = $this->action('GET', 'CitiesController@index');
    $this->assertResponseOk();
  }

  public function testCitiesStoreController()
  {
  }

  public function testCitiesUpdateController()
  {
    $city = App\City::find(1);
    $city->name = "Paris";
    $response = $this->action('PATCH', 'CitiesController@update',
      ['cities' => $city->id],
      $city->jsonSerialize()
    );
    $this->seeInDatabase('cities', ['name' => $city->name]);
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

  public function testCitiesIndexBehavior()
  {
    $this->visit('/cities')
      ->see('Cities')
      ->see('Name')
      ->see('ID')
      ->see('Actions');
  }

  public function testCitiesCreateBehavior()
  {
    $this->visit('/cities')
      ->type('Boston', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testCitiesEditBehavior()
  {
    $this->visit('/cities/1/edit')
      ->type('Seatle', 'name')
      ->select('1', 'region_id')
      ->press('')
      ->seePageIs('/cities');
  }

  public function testCitiesDestroyBehavior()
  {
    $this->visit('/cities')
      ->press('Delete')
      ->seePageIs('/cities');
  }
}
