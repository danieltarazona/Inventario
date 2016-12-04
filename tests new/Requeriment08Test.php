<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment08Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProducts()
    {
      $this->visit('/products');
      $this->see('ID');
      $this->see('Imágen');
      $this->see('Nombre');
      $this->see('Estado');
      $this->see('Serial');
      $this->see('Acciones');
    }
}
