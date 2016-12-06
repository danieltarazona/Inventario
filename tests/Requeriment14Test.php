<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment14Test extends TestCase
{

  use DatabaseTransactions;
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testSalesLog()
  {
    $$admin = App\User::find(4);
    $this->actingAs($admin)
    ->visit('/sales')
    ->see('ID Prestamo')
    ->see('ID Reserva')
    ->see('Entregado')
    ->see('Devuelto')
    ->see('ID Tienda')
    ->see('Almacenista')
    ->see('Estado')
    ->see('Acciones');
  }

}
