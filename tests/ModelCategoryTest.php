<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ModelCategoryTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testCategoryProduct()
    {
      $category = App\Category::find(1);
      dd($category->product);
    }
}
