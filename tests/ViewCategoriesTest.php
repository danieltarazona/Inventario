<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCategoriesTest extends TestCase
{
  public function testViewCategoriesIndexBehavior()
  {
    $this->visit('/categories')
      ->see('Categories')
      ->see('Name')
      ->see('ID')
      ->see('Actions');
  }

  public function testViewCategoriesCreateBehavior()
  {
    $this->visit('/categories')
      ->type('Hello', 'name')
      ->press('')
      ->seePageIs('/categories');
  }

  public function testViewCategoriesEditBehavior()
  {
    $this->visit('/categories/1/edit')
      ->type('Desktop', 'name')
      ->press('')
      ->seePageIs('/categories');
  }

  public function testViewCategoriesDestroyBehavior()
  {
    $this->visit('/categories')
      ->press('Delete')
      ->seePageIs('/categories');
  }
}
