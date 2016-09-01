<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllerCategoriesTest extends TestCase
{
  use DatabaseTransactions;

  public function testCategoriesIndexController()
  {
    $response = $this->action('GET', 'CategoriesController@index');
    $this->assertResponseOk();
  }

  public function testCategoriesStoreController()
  {
    $category = factory(\App\Category::class)->create(['name' => 'Smartphones']);
    $response = $this->action('POST', 'CategoriesController@store', $category->jsonSerialize());
    $this->seeInDatabase('categories', ['name' => $category->name]);
    $this->assertSessionHas('flash', 'success');
    $this->assertEquals(302, $response->status());
  }

  public function testCategoriesUpdateController()
  {
    $category = App\Category::find(1);
    $category->name = "Tablets";
    $response = $this->action('PATCH', 'CategoriesController@update', ['categories' => $category->id], $category->jsonSerialize());
    $this->seeInDatabase('categories', ['name' => $category->name]);
    $this->assertEquals(302, $response->status());
  }

  public function testCategoriesEditController()
  {
    $response = $this->action('GET', 'CategoriesController@edit', ['category' => 1]);
    $this->assertResponseOk();
  }

  public function testCategoriesDestroyController()
  {
    $response = $this->action('DELETE', 'CategoriesController@destroy', ['category' => 1]);
    $this->assertEquals(302, $response->status());
  }
}
