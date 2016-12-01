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
      $this->visit('/login');
      $this->visit('/register');
      $this->type('Test', 'username');
      $this->type('1010101010', 'dni');
      $this->type('test@test.com', 'email');
      $this->type('123456', 'password');
      $this->type('123456', 'password_confirmation');
      $this->press('Registrar');
      $this->seePageIs('/');
    }

}
