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
    $this->visit('/login')
    ->type('admin@admin.com', 'email')
    ->type('123456', 'password')
    ->press('Iniciar Sesión')
    ->seePageIs('/home')
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
