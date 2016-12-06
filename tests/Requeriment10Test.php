<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment10Test extends TestCase
{

  use DatabaseTransactions;
  /**
   * A basic test example.
   *
   * @return void
   */
  public function testOrdersLog()
  {
    $this->visit('/orders');
    $this->see('ID');
    $this->see('Fecha Creacion');
    $this->see('Fecha');
    $this->see('Hora Salida');
    $this->see('Hora Reingreso');
    $this->see('Identificación');
    $this->see('Usuario');
    $this->see('Estado');
    $this->see('Acciones');
  }

}
