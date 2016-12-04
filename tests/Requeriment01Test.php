<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class Requeriment01Test extends TestCase
{

    use DatabaseTransactions;
    /**
     * Test Register Requeriment
     *
     * @return void
     */
    public function testRegister()
    {
      $this->visit('/register');
      $this->type('Test', 'username');
      $this->press('Registrar');
      $this->seePageIs('/register');
      $this->type('TestUser', 'first_name');
      $this->type('TestLast', 'last_name');
      $this->type('1234', 'dni');
      $this->type('test@test.com', 'email');
      $this->type('123456', 'password');
      $this->type('123456', 'password_confirmation');
      $this->press('Registrar');
      $this->seePageIs('/home');
    }

}
