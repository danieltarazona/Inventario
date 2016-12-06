<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerRepairsTest extends TestCase
{
  use DatabaseTransactions;

  public function testRepairsIndexController()
  {
    $storer = App\User::find(3);
    $this->actingAs($storer);
    $response = $this->action('GET', 'RepairsController@index');
    $this->assertResponseOk();
  }

  public function testRepairsCreateController()
  {
    $storer = App\User::find(3);
    $this->actingAs($storer);
    $response = $this->action('GET', 'RepairsController@create');
    $this->assertResponseOk();
  }

  public function testRepairsStoreController()
  {
    /*
    */
    $this->assertTrue(true);
  }

  public function testRepairsUpdateController()
  {
    $this->assertTrue(true);
  }

  public function testrepairsShowController()
  {
    $response = $this->action('GET', 'RepairsController@show', ['repair' => 1]);
    $this->assertResponseOk();
  }

  public function testRepairsEditControllerAsStorer()
  {
    $storer = App\User::find(3);
    $this->actingAs($storer);
    $response = $this->action('GET', 'RepairsController@edit', ['repair' => 1]);
    $this->assertResponseOk();
  }

  public function testRepairsDestroyControllerAsAdmin()
  {
    $admin = App\User::find(3);
    $this->actingAs($admin);
    $response = $this->action('DELETE', 'RepairsController@destroy', ['repair' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
