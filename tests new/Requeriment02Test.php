<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment02Test extends TestCase
{

  use DatabaseTransactions;

  /**
   * Test Login Requeriment
   *
   * @return void
   */
  public function testLogin()
  {
    $this->visit('/login')
    ->type('test@test.com', 'email')
    ->type('123456', 'password')
    ->press('Iniciar Sesión')
    ->seePageIs('/');
  }

  /**
   * Test Logout Requeriment
   *
   * @return void
   */

  public function testLogout()
  {
    $this->visit('/login')
    ->type('admin@admin.com', 'email')
    ->type('123456', 'password')
    ->press('Iniciar Sesión')
    ->seePageIs('/')
    ->press('Carlos / Administrator')
    ->press('Salir')
    ->seePageIs('/login');
  }

}
