<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment03Test extends TestCase
{

  use DatabaseTransactions;
  /**
   * Test Password Recuperation Requeriment
   *
   * @return void
   */
  public function testPassword()
  {
    $this->visit('/login')
    ->visit('/password/reset')
    ->type('user@user.com', 'email')
    ->press('Enviar Link de Restablecimiento')
    ->seePageIs('/password/reset')
    ->see('Hemos enviado tu contraseña de recuperacion');
  }
}
