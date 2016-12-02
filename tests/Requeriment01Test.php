<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment01Test extends TestCase
{
    /**
     * Test Register Requeriment
     *
     * @return void
     */
    public function testRegister()
    {
      $this->visit('/login')
      ->visit('/register')
      ->type('Test', 'username')
      ->type('1010101010', 'dni')
      ->type('test@test.com', 'email')
      ->type('123456', 'password')
      ->type('123456', 'password_confirmation')
      ->press('Registrar')
      ->seePageIs('/');
    }

}
