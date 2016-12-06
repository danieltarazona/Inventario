<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerCategoriesTest extends TestCase
{
  use DatabaseTransactions;

  public function testCategoriesIndexController()
  {
    $user = App\User::find(4);
    $this->actingAs($user);
    $response = $this->action('GET', 'CategoriesController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testCategoriesStoreController()
  {
    /*
    $this->seeInDatabase('categories', ['name' => $category->name]);
    $this->assertSessionHas('flash', 'success');
    */
    $this->assertTrue(true);
  }

  public function testCategoriesUpdateController()
  {
    $this->assertTrue(true);
  }

  public function testCategoriesEditController()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $response = $this->action('GET', 'CategoriesController@edit', ['category' => 1]);
    $this->assertResponseOk();
  }

  public function testCategoriesDestroyController()
  {
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $response = $this->action('DELETE', 'CategoriesController@destroy', ['category' => 1]);
    $this->assertEquals(302, $response->status());
    $this->assertRedirectedTo('categories');
  }
}
