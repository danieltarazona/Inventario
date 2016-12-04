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
    $category = factory(\App\Category::class)->create(['name' => 'HUD']);
    $response = $this->action('POST',
      'CategoriesController@store',
      $category->jsonSerialize()
    );
    $this->seeInDatabase('categories', ['name' => $category->name]);
    $this->assertSessionHas('flash', 'success');
    $this->assertEquals(302, $response->status());
    $this->assertRedirectedTo('categories');
  }

  public function testCategoriesUpdateController()
  {
    $category = App\Category::find(1);
    $category->name = "Test Tablet";
    $response = $this->action(
      'PATCH', 'CategoriesController@update',
      ['categories' => $category->id],
      $category->jsonSerialize()
    );
    $this->seeInDatabase('categories', ['name' => 'Test Tablet']);
    $this->assertEquals(302, $response->status());
    $this->assertRedirectedTo('categories');
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
