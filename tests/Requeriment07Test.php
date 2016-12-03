<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment07Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaleCancel()
    {
      $this->visit('/orders')
      ->press('Edit')
      ->seePageIs('/orders/1/edit')
      ->press('Cancelar')
      ->seePageIs('/orders')
      ->see('Order Cancel Successful!')
      ->see('Cancelado');
    }
}
