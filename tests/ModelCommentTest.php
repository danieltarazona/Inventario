<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelCommentTest extends TestCase
{
  use DatabaseTransactions;
  
    public function testModelCommentBelongsToUser()
    {
      $comment = App\Comment::find(1);
      $user = App\User::find(1);
      $user->comment()->save($user);
      $this->seeInDatabase('comments', [
        'name' => $comment->name,
        'user_id' => $user->id,
      ]);
    }
}
