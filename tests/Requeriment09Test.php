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
    public function testOrderProductAsUser()
    {
      $user = App\User::find(1);
      $this->actingAs($user);
      $this->visit('/products');
      $this->visit('/products/7');
      $this->see('Disponible');
      $this->press('Agregar');
      $this->seePageIs('/cart/1');
      $this->see('Item has been Added!');
    }
}
