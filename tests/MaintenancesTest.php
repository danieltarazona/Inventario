<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class MaintenancesTest extends TestCase
{
  /**
  * A basic test example.
  *
  * @return void
  */

  public function testMaintenancesIndex()
  {
    $seller = App\User::find(2);
    $this->be($seller);

    $response = $this->action('GET', 'MaintenancesController@index');

    $this->assertEquals(200, $response->status());
  }

  public function testMaintenancesUpdate()
  {
    $response = $this->action('PATCH', 'MaintenancesController@update', ['maintenance' => 1]);

    $this->assertEquals(302, $response->status());
  }

  public function testMaintenancesShow()
  {
    $response = $this->action('GET', 'MaintenancesController@show', ['maintenance' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testMaintenancesEdit()
  {
    $response = $this->action('GET', 'MaintenancesController@edit', ['maintenance' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testMaintenancesDestroy()
  {
    $response = $this->action('GET', 'MaintenancesController@destroy', ['maintenance' => 1]);

    $this->assertEquals(200, $response->status());
  }
}
