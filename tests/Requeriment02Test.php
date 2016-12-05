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
  public function testLoginUser()
  {
    $this->visit('/login')
    ->type('user@user.com', 'email')
    ->type('123456', 'password')
    ->press('Iniciar Sesión')
    ->seePageIs('/home');
  }

  /**
   * Test Logout Requeriment
   *
   * @return void
   */

  public function testLogout()
  {
    $user = App\User::find(1);
    $this->actingAs($user)
    ->visit('/home')
    ->press('Menu')
    ->seePageIs('/');
  }

}
