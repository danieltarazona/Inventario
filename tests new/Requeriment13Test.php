<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment13Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductEdit()
    {
      $admin = App\User::find(4);
      $this->actingAs($admin)
      ->visit('/products/6/edit')
      ->type('Lenore Boehm', 'name')
      ->type('%C2@oA', 'serial')
      ->type('10', 'warranty')
      ->type('2012', 'year')
      ->type('2000000', 'price')
      ->select('1', 'region_id')
      ->select('1', 'city_id')
      ->select('1', 'store_id')
      ->select('1', 'category_id')
      ->select('1', 'category_id')
      ->press('Guardar')
      ->seePageIs('/products')
      ->see('Update Complete!');
    }
}
