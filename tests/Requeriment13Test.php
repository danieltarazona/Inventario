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
      $this->visit('/products/6/edit');
      $this->type('Lenore Boehm', 'name');
      $this->type('%C2@oA', 'serial');
      $this->type('10', 'warranty');
      $this->type('2012', 'year');
      $this->type('2000000', 'price');
      $this->select('1', 'region_id');
      $this->select('1', 'city_id');
      $this->select('1', 'store_id');
      $this->select('1', 'category_id');
      $this->select('1', 'category_id');
      $this->press('Guardar');
      $this->seePageIs('/products');
      $this->see('Update Complete!');
    }
}
