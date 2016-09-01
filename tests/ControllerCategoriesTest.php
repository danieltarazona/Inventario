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
    Session::start();
    $response = $this->call('POST', 'CategoriesController@store', array(
        '_token' => csrf_token(),
        ['name' => 'Tablets']
    ));
    $this->assertEquals(302, $response->getStatusCode());
    $this->assertSessionHas('flash', 'success');
    $this->assertRedirectedTo('categories');
  }

  public function testCategoriesUpdateController()
  {
    $category = App\Category::first();
    $category->name = "Tablets";
    $response = $this->action(
      'PUT', 'CategoriesController@update',
      ['categories' => $category->id],
      $category->jsonSerialize()
    );
    $this->seeInDatabase('categories', ['name' => $category->name]);
    $this->assertSessionHas('flash', 'success');
    $this->assertEquals(302, $response->status());
    $this->assertRedirectedTo('categories');
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
    $this->assertRedirectedTo('categories');
  }
}
