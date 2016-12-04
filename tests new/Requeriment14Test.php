<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment14Test extends TestCase
{
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSalesLog()
  {
    $this->visit('/sales');
    $this->see('ID Prestamo');
    $this->see('ID Reserva');
    $this->see('Entregado');
    $this->see('Devuelto');
    $this->see('ID Tienda');
    $this->see('Almacenista');
    $this->see('Estado');
    $this->see('Acciones');
  }

}
