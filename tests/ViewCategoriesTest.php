<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ViewCategoriesTest extends TestCase
{
  use DatabaseTransactions;

  public function testViewCategoriesIndexBehavior()
  {

    $admin = App\User::find(4);
    $this->actingAs($admin);
    $this->visit('/categories')
      ->see('Categories')
      ->see('Name')
      ->see('ID')
      ->see('Acciones');
  }

  public function testViewCategoriesCreateBehavior()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $this->visit('/categories')
      ->type('Hello', 'name')
      ->press('Agregar')
      ->seePageIs('/categories');
  }

  public function testViewCategoriesEditBehavior()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $this->visit('/categories/1/edit')
      ->type('Desktop', 'name')
      ->press('')
      ->seePageIs('/categories');
  }

  public function testViewCategoriesDestroyBehavior()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $this->visit('/categories')
      ->press('Delete')
      ->seePageIs('/categories');
  }
}
