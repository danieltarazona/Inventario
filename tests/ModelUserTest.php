<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelUserTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelUserRol()
  {
    $user = App\User::find(1);
    $rol = App\Rol::find(1);
    $rol->user()->save($user);
    $this->seeInDatabase('users',
    [
      'username' => $user->username,
      'rol_id' => $rol->id
    ]);
  }

  public function testModelUserCity()
  {
    $user = App\User::find(1);
    $city = App\City::find(1);
    $city->user()->save($user);
    $this->seeInDatabase('users',
    [
      'id' => $user->id,
      'city_id' => $city->id
    ]);
  }

  public function testModelUserState()
  {
    $user = App\User::find(1);
    $state = App\State::find(1);
    $state->user()->save($user);
    $this->seeInDatabase('users',
    [
      'id' => $user->id,
      'state_id' => $state->id
    ]);
  }

  public function testModelUserRegion()
  {
    $user = App\User::find(1);
    $region = App\Region::find(1);
    $region->user()->save($user);
    $this->seeInDatabase('users',
    [
      'id' => $user->id,
      'region_id' => $region->id
    ]);
  }

  public function testModelUserStore()
  {
    $user = App\User::find(1);
    $store = App\Store::find(1);
    $store->user()->save($user);
    $this->seeInDatabase('users',
    [
      'id' => $user->id,
      'store_id' => $store->id
    ]);
  }
}
