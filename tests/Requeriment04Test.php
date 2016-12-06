<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment04Test extends TestCase
{

  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrder()
    {
      $admin = App\User::find(4);
      $this->actingAs($admin);
      $this->visit('/products/6');
      $this->press('Reservar');
      $this->visit('/products/7');
      $this->press('Reservar');
      $this->seePageIs('/cart/4');
      $this->press('Reservar');
      $this->seePageIs('/events/create');
      $this->press('Continuar');
      $this->seePageIs('orders');
    }
}
