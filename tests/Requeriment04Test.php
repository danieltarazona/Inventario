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
      $user = App\User::find(1);
      $this->actingAs($user);
      $this->visit('/products/7');
      $this->press('Agregar');
      $this->seePageIs('/cart/1');
      $this->press('Reservar');
      $this->seePageIs('/events/create?Reservar=');
      $this->press('Continuar');
      $this->seePageIs('/orders');
    }
}
