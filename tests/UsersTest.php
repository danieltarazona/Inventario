<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UsersTest extends TestCase
{
  use DatabaseTransactions;
  /**
  * A basic test example.
  *
  * @return void
  */

  public function testUsersIndex()
  {
    $response = $this->action('GET', 'UsersController@index');

    $this->assertEquals(200, $response->status());
  }

  public function testUsersUpdate()
  {
    $response = $this->action('PUT', 'UsersController@update', ['user' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testUsersShow()
  {
    $response = $this->action('GET', 'UsersController@show', ['user' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testUsersEdit()
  {
    $response = $this->action('GET', 'UsersController@edit', ['user' => 1]);

    $this->assertEquals(200, $response->status());
  }

  public function testUsersDestroy()
  {
    $response = $this->action('GET', 'UsersController@destroy', ['user' => 1]);

    $this->assertEquals(200, $response->status());
  }


}
