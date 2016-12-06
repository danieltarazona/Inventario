<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerUsersTest extends TestCase
{
  use DatabaseTransactions;

  public function testUsersIndexController()
  {
    $response = $this->action('GET', 'UsersController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testUsersUpdateController()
  {
    $response = $this->action('PATCH', 'UsersController@update', ['user' => 1, 'name' => 'Admin']);
    $this->assertEquals(302, $response->status());
  }

  public function testUsersShowController()
  {
    $user = App\User::find(1);
    $this->actingAs($user);
    $response = $this->action('GET', 'UsersController@show', ['user' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testUsersEditController()
  {
    $response = $this->action('GET', 'UsersController@edit', ['user' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testUsersDestroyController()
  {
    $response = $this->action('DELETE', 'UsersController@destroy', ['user' => 1]);
    $this->assertEquals(302, $response->status());
  }

}
