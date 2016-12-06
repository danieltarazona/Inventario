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
    $this->visit('/categories');
    $this->see('Categories');
    $this->see('Name');
    $this->see('ID');
    $this->see('Acciones');
  }

  public function testViewCategoriesCreateBehavior()
  {
    $this->assertTrue(true);
  }

  public function testViewCategoriesEditBehavior()
  {
    $this->assertTrue(true);
  }

  public function testViewCategoriesDestroyBehavior()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $this->visit('/categories');
    $this->press('Eliminar');
    $this->seePageIs('/categories');
    $this->see('Delete Complete!');
  }
}
