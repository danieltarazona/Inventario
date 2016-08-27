<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelRolTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelRolBelongsToUser()
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
}
