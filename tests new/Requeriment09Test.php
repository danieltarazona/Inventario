<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment09Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrderProduct()
    {
      $this->visit('/products/6');
      $this->see('Disponible');
      $this->press('Reservar');
      $this->seePageIs('/cart/4');
      $this->see('Item has been Added!');
    }
}
