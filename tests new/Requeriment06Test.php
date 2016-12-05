<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment06Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testSaleUpdate()
    {
      $this->visit('/orders');

      if ($this->see('Cancelado')) {
        $this->press('Edit');
        $this->seePageIs('/orders');
        $this->see('Order can`t be Edited!');
      }

      if ($this->see('En Espera')) {
        $this->press('Edit');
        $this->seePageIs('/orders/1/edit');
        $this->press('Actualizar');
        $this->seePageIs('/orders');
        $this->see('Update Successful!');
      }
    }
}
