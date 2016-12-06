<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelUserTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelUserHasManyComment()
  {
    $comment = App\Comment::find(1);
    $user = App\User::find(1);
    $user->comment()->save($comment);
    $this->seeInDatabase('comments', [
      'name' => $comment->name,
      'user_id' => $user->id,
    ]);
  }

  public function testModelUserState()
  {
    $user = App\User::find(1);
    $state = App\State::find(200);
    $state->user()->save($user);
    $this->seeInDatabase('users',
    [
      'id' => $user->id,
      'state_id' => $state->id
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
