<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerRepairsTest extends TestCase
{
  use DatabaseTransactions;

  public function testrepairsIndexController()
  {
    $response = $this->action('GET', 'repairsController@index');
    $this->assertResponseOk();
  }

  public function testrepairsCreateController()
  {
    $response = $this->action('GET', 'repairsController@create');
    $this->assertResponseOk();
  }

  public function testrepairsStoreController()
  {
    $repair = factory(\App\Repair::class)->create(['name' => 'Install Windows']);
    $response = $this->action(
      'POST', 'repairsController@store',
      $repair->jsonSerialize()
    );
    $this->seeInDatabase('repairs', ['name' => $repair->name]);
    $this->assertEquals(302, $response->status());
    $this->assertRedirectedTo('repairs');
  }

  public function testrepairsUpdateController()
  {
    $this->assertEquals(true);
  }

  public function testrepairsShowController()
  {
    $response = $this->action('GET', 'repairsController@show', ['repair' => 1]);
    $this->assertResponseOk();
  }

  public function testrepairsEditController()
  {
    $response = $this->action('GET', 'repairsController@edit', ['repair' => 1]);
    $this->assertResponseOk();
  }

  public function testrepairsDestroyController()
  {
    $response = $this->action('DELETE', 'repairsController@destroy', ['repair' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
