<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelRolTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelRoleBelongsToUser()
  {
    $user = App\User::find(1);
    $role = App\Role::find(1);
    $role->user()->save($user);
    $this->seeInDatabase('users',
    [
      'username' => $user->username,
      'role_id' => $role->id
    ]);
  }
}
