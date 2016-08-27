<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelCommentTest extends TestCase
{
  use DatabaseTransactions;

  public function testTest()
  {
    $this->assertTrue(true);
  }
}
