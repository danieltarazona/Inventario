<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelCategoryTest extends TestCase
{
  use DatabaseTransactions;

  public function testModelCategoryHasManyProduct()
  {
    factory(App\Product::class, 10)->create()->each(function($product)
    {
      $category = App\Category::find(1);
      $category->product()->save($product);
      $this->seeInDatabase('products',
      [
        'id' => $product->id,
        'category_id' => $category->id
      ]);
    });

    $Collection = 'Illuminate\Database\Eloquent\Collection';
    $category = App\Category::find(1);
    $this->assertInstanceOf($Collection, $category->product);
    foreach($category->product as $product) {
      $this->assertEquals($category->id, $product->category_id);
    }
  }
}
