<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

/*
class UsersTest extends TestCase
{
  use DatabaseTransactions;

  public function testUsersIndexController()
  {
    $response = $this->action('GET', 'UsersController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testUsersUpdateController()
  {
    $user = App\User::find(1);
    $user->name = "XYZ";
    $response = $this->action('PUT', 'UsersController@update', $user);
    $this->assertEquals(302, $response->status());
  }

  public function testUsersShowController()
  {
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
