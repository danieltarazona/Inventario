<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment05Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSale()
    {
      $this->visit('/orders')
      ->visit('/orders/1')
      ->see('ID')
      ->see('Apple')
      ->see('6')
      ->press('Préstamo')
      ->seePageIs('/sales');
    }

}
