<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\User;

class CategoriesTest extends TestCase
{

  use DatabaseTransactions;
  /**
  * A basic test example.
  *
  * @return void
  */

  public function testCategoriesIndexController()
  {
    $admin = App\User::find(7);
    $this->be($admin);
    $response = $this->action('GET', 'CategoriesController@index');
    $this->assertEquals(200, $response->status());
  }

  public function testCategoriesIndexBehavior()
  {
    $this->visit('categories')
      ->see('Categories');
  }

  public function testCategoriesCreateController()
  {
    $response = $this->action('GET', 'CategoriesController@create');
    $this->assertEquals(404, $response->status());
  }

  public function testCategoriesCreateBehavior()
  {
    $this->visit('categories')
      ->see('Create')
      ->type('Notebooks')
      ->click('Create');
  }


  public function testCategoriesStoreController()
  {
    $category = factory(\App\Category::class)->create(['name' => 'Tablets']);
    $this->post(route('categories.store'), $category->jsonSerialize(), $this->jsonHeaders)
      ->seeInDatabase('categories', ['name' => $category->name])
      ->assertResponseOk();
  }

  public function testCategoriesUpdateController()
  {
    $admin = App\User::find(7);
    $this->be($admin);
    $category = App\Category::find(1);
    $category->name = "Smarthphones";
    $response = $this->action('PUT', 'CategoriesController@update', $category->id);
    $this->assertEquals(302, $response->status());
  }

  public function testCategoriesEditController()
  {
    $response = $this->action('GET', 'CategoriesController@edit', ['maintenance' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testCategoriesEditBehavior()
  {
    $response = $this->action('GET', 'CategoriesController@edit', ['maintenance' => 1]);
    $this->assertEquals(200, $response->status());
  }

  public function testCategoriesDestroy()
  {
    $response = $this->action('DELETE', 'CategoriesController@destroy', ['maintenance' => 1]);
    $this->assertEquals(302, $response->status());
  }

  public function testCategoriesDestroyBehavior()
  {
    $this->visit('categories')
      ->see('Delete')
      ->click('Delete')
      ->assertRedirectTo('categories');

  }
}
