<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerMaintenancesTest extends TestCase
{
  use DatabaseTransactions;

  public function testMaintenancesIndexController()
  {
    $response = $this->action('GET', 'MaintenancesController@index');
    $this->assertResponseOk();
  }

  public function testMaintenancesCreateController()
  {
    $response = $this->action('GET', 'MaintenancesController@create');
    $this->assertResponseOk();
  }

  public function testMaintenancesStoreController()
  {
    $maintenance = factory(\App\Maintenance::class)->create(['name' => 'Install Windows']);
    $response = $this->action(
      'POST', 'MaintenancesController@store',
      $maintenance->jsonSerialize()->name
    );
    $this->seeInDatabase('maintenances', ['name' => $maintenance->name]);
    $this->assertEquals(302, $response->status());
  }

  public function testMaintenancesUpdateController()
  {
    $this->assertEquals(true);
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
