<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment04Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrder()
    {
      $this->visit('/');
      $this->visit('/products');
      $this->visit('/products/6');
      $this->press('Reservar');
      $this->visit('/products/7');
      $this->press('Reservar');
      $this->seePageIs('/cart/4');
      $this->press('Reservar Todo');
      $this->seePageIs('/events/create');
    }
}
