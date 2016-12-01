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
    $this->visit('/login');
    $this->type('admin', 'email');
    $this->type('admin@admin.com', 'email');
    $this->type('123456', 'password');
    $this->press('Iniciar Sesión');
    $this->seePageIs('/');
  }

  /**
   * Test Logout Requeriment
   *
   * @return void
   */

  public function testLogout()
  {
    $this->visit('/');
    $this->press('Carlos / Administrator');
    $this->press('Salir');
    $this->seePageIs('/login');
  }

}
