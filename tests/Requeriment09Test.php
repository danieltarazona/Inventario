<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment09Test extends TestCase
{

  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testOrderProduct()
    {
      $admin = App\User::find(4);
      $this->actingAs($admin);
      $this->visit('/products');
      $this->visit('/products/6');
      $this->see('Disponible');
      $this->press('Reservar');
      $this->seePageIs('/cart/4');
      $this->see('Item has been Added!');
    }
}
