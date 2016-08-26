<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*
class MaintenancesControllerTest extends TestCase
{
  use DatabaseTransactions;

  public function testMaintenancesIndexController()
  {
    $response = $this->action('GET', 'MaintenancesController@index');
    $this->assertResponseOk();
  }

  public function testMaintenancesCreateController()
  {
    $response = $this->action('GET', 'MaintenancesController@create', ['maintenance' => 1]);
    $this->assertResponseOk();
  }

  public function testMaintenancesStoreController()
  {
    $maintenance = factory(\App\Maintenance::class)->create(['name' => 'Install OSX']);
    $response = $this->action('POST', 'MaintenancesController@store', $maintenance->jsonSerialize());
    $this->seeInDatabase('maintenances', ['name' => $maintenance->name]);
    $this->assertEquals(302, $response->status());
  }

  public function testMaintenancesUpdateController()
  {
    $maintenance = App\Maintenance::find(1);
    $maintenance->name = "Install Windows";
    $response = $this->action('PATCH', 'MaintenancesController@update', ['maintenances' => $maintenance->id], $maintenance->jsonSerialize());
    $this->seeInDatabase('maintenances', ['name' => $maintenance->name]);
    $this->assertEquals(302, $response->status());
  }

  public function testMaintenancesShowController()
  {
    $response = $this->action('GET', 'MaintenancesController@show', ['maintenance' => 1]);
    $this->assertResponseOk();
  }

  public function testMaintenancesEditController()
  {
    $response = $this->action('GET', 'MaintenancesController@edit', ['maintenance' => 1]);
    $this->assertResponseOk();
  }

  public function testMaintenancesDestroyController()
  {
    $response = $this->action('DELETE', 'MaintenancesController@destroy', ['maintenance' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
