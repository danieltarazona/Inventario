<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment05Test extends TestCase
{

  use DatabaseTransactions;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaleAsStorer()
    {
      $storer = App\User::find(3);
      $this->actingAs($storer);
      $this->visit('/orders');
      $this->see('En Espera');
      $this->visit('/orders/1');
      $this->press('Préstar');
      $this->seePageIs('/sales');
    }

}
