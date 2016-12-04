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
      $admin = App\User::find(4);
      $this->actingAs($admin)
      ->visit('/products/6')
      ->press('Reservar')
      ->visit('/products/7')
      ->press('Reservar')
      ->seePageIs('/cart/4')
      ->press('Continuar')
      ->seePageIs('/events/create');
    }
}
