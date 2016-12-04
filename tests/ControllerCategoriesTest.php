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
    $admin = App\User::find(4);
    $this->actingAs($admin);
    $params = [
      '_token' => csrf_token(),
      'name'   => 'Tablets 2 in 1',
    ];
    $response = $this->call('POST', 'CategoriesController@store', $params);
    $this->assertResponseOk();
    $this->assertRedirectedTo('categories');
  }

  public function testCategoriesUpdateController()
  {
    $user = App\User::find(4);
    $this->actingAs($user);
    $category = App\Category::first();
    $category->name = "Tablets";
    $response = $this->action(
      'PUT', 'CategoriesController@update',
      ['categories' => $category->id],
      $category->jsonSerialize()
    );
    $this->seeInDatabase('categories', ['name' => $category->name]);
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
