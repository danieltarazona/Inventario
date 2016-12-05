<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment16Test extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductStore()
    {
      $this->visit('/login')
      ->type('admin@admin.com', 'email')
      ->type('123456', 'password')
      ->press('Iniciar Sesión')
      ->seePageIs('/home')
      ->visit('/products')
      ->visit('/products/create')
      ->type('TestProduct', 'name')
      ->type('TESTSERIAL', 'serial')
      ->type('2016', 'year')
      ->type('20000000', 'price')
      ->type('12', 'warranty')
      ->press('Agregar')
      ->seePageIs('/products')
      ->see('Create Product Complete!');
    }
}
