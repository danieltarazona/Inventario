<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment03Test extends TestCase
{
  /**
   * Test Password Recuperation Requeriment
   *
   * @return void
   */
  public function testPassword()
  {
    $this->visit('/login');
    $this->visit('/password/reset');
    $this->type('test@test.com', 'email');
    $this->press('Enviar Link de Restablecimiento');
    $this->seePageIs('/password/reset');
    $this->see('Hemos enviado tu contraseña de recuperacion!');
  }
}
