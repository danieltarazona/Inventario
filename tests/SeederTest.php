<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SeederTest extends TestCase
{
  use DatabaseTransactions;

  public function testSeeder()
  {
    $this->assertTrue(true);
  }
}
